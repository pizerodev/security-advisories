# Coordinated Vulnerability Disclosure Policy

Pizero · Version 1.0 · Effective 2026-11-05

This policy governs how Pizero reports vulnerabilities identified in third-party software to the parties responsible for remediation, and when and how findings are published. It is informed by ISO/IEC 29147:2018, the CERT/CC Guide to Coordinated Vulnerability Disclosure, and the national CVD policy adopted by the Italian National Cybersecurity Agency (ACN).

## 1. Scope

1.1 This policy applies to vulnerabilities identified through independent research in open-source software and in commercially licensed products.

1.2 Findings arising from client engagements are confidential and governed by the applicable contract. They are outside the scope of this policy and are not published in this repository.

## 2. Research conduct

2.1 Analysis is performed through source code review and, where stated, dynamic testing in environments operated by Pizero. Third-party production systems are not tested, and third-party data is not accessed, retained or modified.

2.2 Each advisory states the methodology used and the exact version and configuration under which the finding was verified.

## 3. Reporting

3.1 Day 0 is the date of the first contact attempt with the vendor.

3.2 Reports are submitted through the first available channel in this order: GitHub private vulnerability reporting; the security contact published in `SECURITY.md` or `security.txt` (RFC 9116); the vendor's published security or support contact. When the only available channel is not confidential, the initial message requests a secure channel and contains no technical detail.

3.3 A report includes the affected component and versions, a root-cause analysis, an impact assessment with a CVSS v4.0 vector, a minimal proof of concept, and, where feasible, a candidate patch.

3.4 Vendors are asked to acknowledge receipt within 7 days. In the absence of a response, follow-ups are sent on Day 7 and Day 14, through a secondary channel where one exists. The Day 14 follow-up states the scheduled publication date.

3.5 When a vendor cannot be reached or coordination stalls, the case may be referred to a coordinator: CSIRT Italia, CERT/CC (VINCE), or the CNA responsible for the product.

3.6 Before publication, technical details are shared only with the vendor and, where necessary, with coordinators and CNAs.

## 4. Publication timeline

| Condition | Publication |
|---|---|
| Default | Day 45 |
| Vendor has acknowledged the report and remediation is in progress | Up to Day 90; extended by mutual agreement against a documented remediation plan |
| Fixed release publicly available before the applicable deadline | 7 days after the fixed release, so that operators have time to upgrade; earlier if the vendor publishes its own advisory |
| Product archived, end-of-life, or declared unsupported | Day 30, with mitigations for operators |
| Active exploitation, or prior public disclosure by a third party | Accelerated: a limited advisory with mitigations as soon as practicable; full technical details according to the conditions above |

Any deviation from these timelines is recorded, with its rationale, in the advisory timeline.

## 5. Advisory content

5.1 Published advisories state the affected and fixed versions, the root cause, the impact, the remediation and mitigations, the disclosure timeline, and credits.

5.2 Technical detail is limited to what defenders need to assess exposure and verify remediation. Proof-of-concept material is published only once a fixed release is available or the product is unmaintained, and is restricted to a minimal, non-weaponized demonstration.

5.3 Vendor correspondence is represented in the timeline by dates and by the substance of each response. It is not reproduced verbatim.

5.4 Corrections are issued as dated revisions of the same advisory. Identifiers and URLs are never reused.

## 6. CVE assignment

6.1 Identifiers are requested from the most specific competent CNA, in this order: the vendor, if it is a CNA; GitHub, for projects hosted there, through a repository security advisory published by the maintainers; the ecosystem CNA where one is established (for WordPress components: WPScan, Patchstack or Wordfence, under their published rules); MITRE as CNA of Last Resort.

6.2 Vendors that intend to request an identifier themselves are asked to state this on the report, so that duplicate assignments are avoided.

6.3 On publication, the advisory URL is submitted to the assigning CNA as a reference for the CVE record.

## 7. Credit

Advisories credit "Michele Cerreta, Pizero". Vendors are asked to use the same form in their own advisories and release notes.

## 8. Compensation

Reporting and disclosure timelines are not conditional on any form of compensation. Where a vendor operates a bug bounty program, participation is at Pizero's discretion and subject to the program's terms.

## 9. Contact

michele@pizero.dev  
OpenPGP key: `0EA7 47D2 E02B 77AE C266  51CC 8BB2 151D 3ABF 2F7C`  
Public key: [keys/michele-pizero.asc](keys/michele-pizero.asc); also on [keys.openpgp.org](https://keys.openpgp.org/search?q=michele%40pizero.dev)

## 10. Revision history

| Version | Date | Changes |
|---|---|---|
| 1.0 | 2026-11-05 | Initial version |

## References

- ISO/IEC 29147:2018, Information technology. Security techniques. Vulnerability disclosure.
- ISO/IEC 30111:2019, Information technology. Security techniques. Vulnerability handling processes.
- A. D. Householder, G. Wassermann, A. Manion, C. King, *The CERT Guide to Coordinated Vulnerability Disclosure*, CMU/SEI-2017-SR-022, Software Engineering Institute, 2017.
- FIRST, *Guidelines and Practices for Multi-Party Vulnerability Coordination and Disclosure*, Version 1.1, 2020.
- FIRST, *Common Vulnerability Scoring System v4.0: Specification Document*, 2023.
- Agenzia per la Cybersicurezza Nazionale, *Politica nazionale di divulgazione coordinata delle vulnerabilità*, 2026. https://www.acn.gov.it/portale/csirt-italia/cvd
- RFC 9116, *A File Format to Aid in Security Vulnerability Disclosure*, 2022.
