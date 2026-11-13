# Pizero Security Advisories

Vulnerability advisories published by [Pizero](https://pizero.dev) (Pizero Design srl). Each advisory is released after coordinated disclosure with the affected vendor under the [disclosure policy](DISCLOSURE-POLICY.md) and carries a permanent identifier of the form `PZSA-YYYY-NNN` (Pizero Security Advisory).

## Advisories

<!-- advisories:start -->
| ID | Published | Product | Title | Severity | CVE |
|---|---|---|---|---|---|
| [PZSA-2026-001](advisories/PZSA-2026-001.md) | 2026-11-13 | typicms/core | typicms/core 16.0.5 to 17.0.45: exposure of every user's API token through the users and history API | High | pending |
| [PZSA-2026-002](advisories/PZSA-2026-002.md) | 2026-11-13 | typicms/core | typicms/core 17.0.0 to 17.0.46: stored cross-site scripting in the JSON-LD block of public pages | Medium | pending |
| [PZSA-2026-003](advisories/PZSA-2026-003.md) | 2026-11-13 | keystone (keystone-classic) | keystone (keystone-classic) 4.0.0 to 4.2.1: CSRF validation passes for sessions that hold no CSRF secret | Medium | pending |
| [PZSA-2026-004](advisories/PZSA-2026-004.md) | 2026-11-13 | keystone (keystone-classic) | keystone (keystone-classic) 4.0.0 to 4.2.1: CSV export does not neutralise values starting with + (incomplete fix for CVE-2017-15879) | Medium | pending |
| [PZSA-2026-005](advisories/PZSA-2026-005.md) | 2026-11-13 | keystone (keystone-classic) | keystone (keystone-classic) 4.0.0 to 4.2.1: Session API returns the raw user document, including the bcrypt password hash | Medium | pending |
| [PZSA-2026-006](advisories/PZSA-2026-006.md) | 2026-11-13 | keystone (keystone-classic) | keystone (keystone-classic) 4.0.0 to 4.2.1: Cloudinary upload API accepts POSTs without a CSRF token | Low | none |
<!-- advisories:end -->

Findings under coordinated disclosure are listed only from their publication date.

## Disclosure at a glance

- Private report to the vendor on Day 0, through GitHub private vulnerability reporting or the vendor's security contact.
- Publication on Day 45 by default, up to Day 90 when remediation is in progress, on Day 30 for unmaintained products, and 7 days after a fix is public.
- CVE identifiers through the competent CNA, with MITRE as CNA of Last Resort.
- Research is conducted exclusively in environments operated by Pizero.

The [policy](DISCLOSURE-POLICY.md) is the normative reference.

## Repository structure

| Path | Content |
|---|---|
| `advisories/PZSA-YYYY-NNN.md` | Advisory, with YAML front matter |
| `advisories/PZSA-YYYY-NNN/` | Supplementary material: patches, regression tests |
| `TEMPLATE.md` | Advisory template |
| `scripts/build-index.py` | Regenerates the index above from the front matter |
| `keys/` | OpenPGP public key for encrypted reports |
| `CITATION.cff` | Citation metadata |

## Citation

Cite an advisory by identifier and URL, for example:

> M. Cerreta, "PZSA-2026-001: &lt;title&gt;," Pizero Security Advisory, Pizero, 2026. https://github.com/pizerodev/security-advisories/blob/main/advisories/PZSA-2026-001.md

## Contact

michele@pizero.dev · OpenPGP `0EA7 47D2 E02B 77AE C266  51CC 8BB2 151D 3ABF 2F7C` ([public key](keys/michele-pizero.asc))

Vendors coordinating a publication date, a CVE assignment or a credit line can reply on the original report.

## License

Advisory text © Pizero Design srl, licensed under [CC BY 4.0](LICENSE); attribute as "Pizero, https://github.com/pizerodev/security-advisories". Patches and scripts: [MIT](LICENSE-CODE).
