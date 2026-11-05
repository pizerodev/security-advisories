---
id: PZSA-YYYY-NNN
title: "<Product> <affected range>: <vulnerability class> in <component>"
vendor: <vendor>
product: <product or package name>
ecosystem: <npm | PyPI | Packagist | WordPress | GitHub | other>
affected: "<version range>"
fixed: "<version | none>"
cwe: CWE-NNN
cwe_name: "<CWE name>"
cvss_v4: "CVSS:4.0/..."
cvss_v4_score: <0.0-10.0>
severity: <None | Low | Medium | High | Critical>
cvss_v3: "<optional CVSS:3.1/... vector>"
cve: <CVE-YYYY-NNNNN | pending | none>
ghsa: <GHSA-xxxx-xxxx-xxxx | none>
method: <source review | dynamic testing | source review and dynamic testing>
verified_version: "<version and commit>"
reported: YYYY-MM-DD
published: YYYY-MM-DD
updated: YYYY-MM-DD
status: <draft | published | revised | withdrawn>
credits: "Michele Cerreta, Pizero"
---

# PZSA-YYYY-NNN: <title>

## Summary
<Two to four sentences: the product, the flaw and its class, the attacker preconditions, the consequence, the fixed version.>

## Affected versions
<Version and commit on which the finding was verified. Affected range and the evidence on which it rests (for example, the commit that introduced the code). Fixed version and fix commit.>

## Methodology
<Source review, dynamic testing, or both. Test environment: platform, relevant configuration, non-default settings.>

## Technical analysis
<Root cause, with references to files, functions and line numbers at the analyzed commit. Detail limited to what is needed to understand and verify the fix.>

## Impact
<Preconditions, privileges and user interaction required, capabilities gained by the attacker, environmental dependencies. Rationale for any CVSS metric that is not self-evident.>

## Proof of concept
<Only when a fixed release is available or the product is unmaintained. Minimal and non-weaponized.>

## Remediation
<Vendor fix. Additional actions required of operators. Workarounds for those who cannot upgrade. Patch, for unmaintained products.>

## Timeline
| Date | Event |
|---|---|
| YYYY-MM-DD | Reported to the vendor via <channel> |

## Credits
Michele Cerreta, Pizero.

## References
- <Fix commit>
- <Fixed release>
- <Affected source at the analyzed commit>
- <CVE record / GHSA>

## Revision history
| Date | Change |
|---|---|
| YYYY-MM-DD | Initial publication |
