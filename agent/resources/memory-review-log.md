# Memory review record — 2026-11-11

The initial memory was revised through four adversarial review passes by a GPT-6.1 Sol agent on the `marco/modulo-inventario` branch. For this documentation-only PR, the memory was adapted to the current `main` tree; feature-branch-only facts were removed or explicitly scoped. `SYSTEM_MEMORY.md` is the current reference, and source code remains authoritative.

| Pass | Findings incorporated |
| --- | --- |
| 1 | Corrected prescription table name; documented Basic credential handoff, weak PHP page gate, actor fallback in inventory, signing/QR caveats, deployment and QMD setup; added relationships, access map and local checks. |
| 2 | Corrected Laravel comma middleware semantics after inspecting installed Pipeline code; expanded history/schedule rules, UI consultation transitions, notification paths, report template and timezone behavior. |
| 3 | Distinguished appointment form dates from consultation dates, documented missing `create_at` in new-consultation request, qualified PDF behavior, improved module navigation. |
| 4 | Removed template permission pages from the active account workflow map. Final adversarial audit found no blocking factual errors in the core memory. |

Unresolved code issues are listed in `SYSTEM_MEMORY.md` section 8. The four-pass acceptance applied to the initial feature-branch snapshot; this `main` adaptation needs PR review. It does not certify application behavior, production state, or clinical correctness.
