# AI entry point

Read [`agent/SYSTEM_MEMORY.md`](agent/SYSTEM_MEMORY.md) before changing this clinical system. It is the verified architecture and business-context map, with source paths and known gaps. Recheck the referenced code before relying on a detail after a change.

The user's primary language is Spanish. Communicate with the user in Spanish by default. The primary AI memory is written in English: before any QMD CLI or MCP search based on a Spanish request, translate the search intent and descriptive terms into English. Keep code identifiers, API paths, database fields, role names, and quoted literals unchanged. If a search returns no result, retry with English terms and relevant identifiers before concluding the information is absent; use Spanish terms too when searching Spanish plans or prompts. Retrieve the matching document, not only its search snippet.

The `agent/` directory is the home for AI working resources: `plans/`, `prompts/`, `resources/`, and `tools/`. Add future plans, prompts, reference material, and tool instructions there. See [`agent/README.md`](agent/README.md) for the index and QMD retrieval workflow. Inventory movement plans currently live on the separate `marco/modulo-inventario` branch and are not part of this `main` documentation branch.

For every new or revised Markdown in `agent/`, follow [`agent/tools/markdown-approval-and-indexing.md`](agent/tools/markdown-approval-and-indexing.md): review the draft, obtain explicit approval, then run `qmd update` and verify retrieval. Do not index an unapproved draft intentionally.

Do not place patient data, credentials, tokens, or production database exports in AI memory or QMD collections. Preserve uncommitted work; inspect `git status` before editing.
