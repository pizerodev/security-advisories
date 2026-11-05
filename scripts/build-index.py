#!/usr/bin/env python3
"""Regenerate the advisory index in README.md from the front matter of advisories/PZSA-*.md."""
import pathlib
import re

LISTED = {"published", "revised", "withdrawn"}
EMPTY = "_No advisories published yet._"

root = pathlib.Path(__file__).resolve().parent.parent


def cell(value):
    return str(value).replace("|", "\\|")


def severity(fm):
    if fm.get("severity"):
        return fm["severity"]
    # Legacy files: "<score> <severity> (CVSS:3.1/...)"
    return fm.get("cvss", "").split("(")[0].strip()


rows = []
for f in sorted((root / "advisories").glob("PZSA-*.md")):
    text = f.read_text(encoding="utf-8")
    m = re.match(r"---\n(.*?)\n---\n", text, re.S)
    if not m:
        continue
    fm = {}
    for line in m.group(1).splitlines():
        if ":" in line:
            k, v = line.split(":", 1)
            fm[k.strip()] = v.strip().strip('"')
    if fm.get("status") not in LISTED:
        continue
    fm["file"] = f.name
    rows.append(fm)

rows.sort(key=lambda r: (r.get("published", ""), r.get("id", "")))
if rows:
    lines = ["| ID | Published | Product | Title | Severity | CVE |", "|---|---|---|---|---|---|"]
    for r in rows:
        title = r.get("title", "")
        if r.get("status") == "withdrawn":
            title += " (withdrawn)"
        lines.append(
            f"| [{cell(r['id'])}](advisories/{r['file']}) | {cell(r.get('published', ''))} "
            f"| {cell(r.get('product', ''))} | {cell(title)} "
            f"| {cell(severity(r))} | {cell(r.get('cve', ''))} |"
        )
    table = "\n".join(lines)
else:
    table = EMPTY

readme = root / "README.md"
s = readme.read_text(encoding="utf-8")
s = re.sub(
    r"(<!-- advisories:start -->\n).*?(\n<!-- advisories:end -->)",
    lambda m: m.group(1) + table + m.group(2),
    s,
    flags=re.S,
)
readme.write_text(s, encoding="utf-8")
print(f"{len(rows)} advisories indexed")
