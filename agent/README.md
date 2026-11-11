# AI resource index

| Path | Purpose |
| --- | --- |
| `SYSTEM_MEMORY.md` | Primary technical and business context; start here. |
| `plans/` | Task plans and design notes (existing inventory work). |
| `prompts/` | Reusable task prompts. |
| `resources/` | Supporting reference material, including the four-pass memory review record. |
| `tools/` | Tool usage notes, including QMD indexing and the Markdown approval workflow. |

The primary memory is written in English for direct model retrieval. Source identifiers, API names, database fields, UI labels, and role names retain their spelling in the code (mostly Spanish).

Use `qmd search "consultation appointment" -c cr-clinik-agent` or the QMD MCP server to retrieve focused sections. For new or revised Markdown, follow [`tools/markdown-approval-and-indexing.md`](tools/markdown-approval-and-indexing.md): index only after explicit approval, then verify a search result. The collection setup is documented in `tools/qmd.md`.
