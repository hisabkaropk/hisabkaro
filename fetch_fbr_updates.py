#!/usr/bin/env python3
"""
fetch_fbr_updates.py

Regenerates updates.json from FBR's official Press Releases page
(https://www.fbr.gov.pk/pr), filtered down to items relevant to individual
taxpayers -- filing, budget, ATL/filer status, and system notices. FBR's
press release feed is dominated by customs seizure/anti-smuggling reports,
which this script deliberately excludes.

WHY THIS SCRIPT EXISTS
-----------------------
The website's "Latest Updates" section reads a local updates.json file, not
a live government feed -- FBR does not publish an RSS/JSON feed, and even if
it did, a static site can't reliably fetch cross-origin from a government
domain in the browser. This script is the realistic way to keep that file
current: run it on a schedule (see cron example below) on YOUR OWN server or
hosting, and it rewrites updates.json in place.

IMPORTANT CAVEATS -- READ BEFORE RELYING ON THIS
--------------------------------------------------
1. This was written without the ability to test it live (no network access
   in the environment that built it). FBR's page structure may not match
   the selectors below exactly -- inspect the actual page HTML (right-click
   -> Inspect on https://www.fbr.gov.pk/pr) and adjust the CSS selectors in
   `parse_press_releases()` if the script returns nothing or garbage.
2. Government sites occasionally change markup without notice. Treat this
   as a starting point to maintain, not a "set and forget" tool.
3. Be a polite scraper: this script fetches one page, at a reasonable
   interval (see cron example), and identifies itself with a normal
   User-Agent. Don't reduce the interval below once every few hours --
   there's no benefit to you and it's an unnecessary load on a government
   server. Check https://www.fbr.gov.pk's terms of use before deploying.
4. This only pulls the press release LIST page (titles, dates, links) --
   it does not scrape full article text, so there's no copyright concern
   with republishing FBR's own headline as a link title.

SETUP
-----
    pip install requests beautifulsoup4

USAGE
-----
    python3 fetch_fbr_updates.py /path/to/your/site/updates.json

    If no path is given, it writes ./updates.json in the current directory.

CRON EXAMPLE (runs once daily at 8am server time)
--------------------------------------------------
    0 8 * * * cd /var/www/yoursite && /usr/bin/python3 fetch_fbr_updates.py updates.json >> fetch_fbr_updates.log 2>&1

"""

import json
import re
import sys
from datetime import datetime
from pathlib import Path

try:
    import requests
    from bs4 import BeautifulSoup
except ImportError:
    print("Missing dependencies. Run: pip install requests beautifulsoup4")
    sys.exit(1)

FBR_PRESS_RELEASE_URL = "https://www.fbr.gov.pk/pr"
MAX_ITEMS = 6

# Only keep press releases whose title contains at least one of these
# (case-insensitive). This is what filters out the customs/smuggling noise.
INCLUDE_KEYWORDS = [
    "tax return", "income tax", "filing", "filer", "atl", "active taxpayer",
    "budget", "finance act", "slab", "withholding", "iris", "deadline",
    "ntn", "extension", "revenue collection",
]

# Always drop items matching these, even if they also match an include
# keyword above (belt-and-suspenders against enforcement/seizure stories).
EXCLUDE_KEYWORDS = [
    "smuggl", "seiz", "customs enforcement", "narcotics", "hashish",
    "cigarette", "arrest", "raid", "martyrdom", "shahadat", "sealed",
    "sealing", "retire", "farewell", "condemn", "obituary",
]

# Rough tag assignment based on keywords in the title, for the site's
# colored "tag" pill. Falls back to "Notice".
TAG_RULES = [
    (["budget", "finance act", "slab"], "Budget"),
    (["atl", "active taxpayer", "filer status"], "ATL"),
    (["deadline", "extend", "return", "filing", "iris return"], "Filing"),
    (["iris", "system", "maintenance", "portal"], "System"),
]


def guess_tag(title: str) -> str:
    lower = title.lower()
    for keywords, tag in TAG_RULES:
        if any(k in lower for k in keywords):
            return tag
    return "Notice"


def parse_date(raw: str):
    """
    FBR's press release list shows dates like 'Aug 18, 2026' appended to the
    link text. Adjust this pattern if the actual markup differs.
    """
    match = re.search(r"([A-Z][a-z]{2}\s+\d{1,2},\s+\d{4})", raw)
    if not match:
        return None
    try:
        dt = datetime.strptime(match.group(1), "%b %d, %Y")
        return dt.strftime("%Y-%m-%d")
    except ValueError:
        return None


def fetch_press_releases():
    headers = {
        "User-Agent": "Mozilla/5.0 (compatible; HisabKaroUpdatesBot/1.0; "
                      "+https://hisabkaro.pk/about-updates-bot)"
    }
    resp = requests.get(FBR_PRESS_RELEASE_URL, headers=headers, timeout=20)
    resp.raise_for_status()
    return resp.text


def parse_press_releases(html: str):
    """
    Parses FBR's press release listing into a list of dicts.
    NOTE: selector may need adjustment -- see caveats at top of file.
    Each press release on the page currently appears as an <a> tag whose
    text combines the headline and a trailing date, linking to a
    /pr/<slug>/<id> URL.
    """
    soup = BeautifulSoup(html, "html.parser")
    items = []

    for a in soup.find_all("a", href=True):
        href = a["href"]
        if "/pr/" not in href:
            continue
        text = a.get_text(strip=True)
        if not text:
            continue

        date_str = parse_date(text)
        if not date_str:
            continue

        # Title is everything before the date substring.
        title = re.sub(r"[A-Z][a-z]{2}\s+\d{1,2},\s+\d{4}\s*$", "", text).strip()
        if not title:
            continue

        lower = title.lower()
        if any(k in lower for k in EXCLUDE_KEYWORDS):
            continue
        if not any(k in lower for k in INCLUDE_KEYWORDS):
            continue

        url = href if href.startswith("http") else f"https://www.fbr.gov.pk{href}"

        items.append({
            "date": date_str,
            "tag": guess_tag(title),
            "title": title,
            # Summary left blank -- fill in manually or extend this script to
            # fetch each article page and extract a first-paragraph excerpt.
            "summary": "",
            "url": url,
        })

    # De-duplicate by URL, keep newest first
    seen = set()
    deduped = []
    for item in sorted(items, key=lambda x: x["date"], reverse=True):
        if item["url"] in seen:
            continue
        seen.add(item["url"])
        deduped.append(item)

    return deduped[:MAX_ITEMS]


def main():
    out_path = Path(sys.argv[1]) if len(sys.argv) > 1 else Path("updates.json")

    print(f"Fetching {FBR_PRESS_RELEASE_URL} ...")
    html = fetch_press_releases()

    print("Parsing and filtering press releases ...")
    items = parse_press_releases(html)

    if not items:
        print("WARNING: No matching press releases found. FBR's page "
              "structure may have changed -- inspect the page and update "
              "the selectors in parse_press_releases().")
        sys.exit(1)

    # Preserve any existing hand-written summaries when a URL already
    # exists in the current file, so re-running this script doesn't wipe
    # out summaries you've manually improved.
    if out_path.exists():
        try:
            existing = json.loads(out_path.read_text())
            existing_by_url = {e["url"]: e for e in existing}
            for item in items:
                prior = existing_by_url.get(item["url"])
                if prior and prior.get("summary"):
                    item["summary"] = prior["summary"]
        except (json.JSONDecodeError, KeyError):
            pass

    out_path.write_text(json.dumps(items, indent=2, ensure_ascii=False))
    print(f"Wrote {len(items)} items to {out_path}")
    for item in items:
        flag = "" if item["summary"] else "  <- needs a summary written by hand"
        print(f"  {item['date']}  {item['title']}{flag}")


if __name__ == "__main__":
    main()
