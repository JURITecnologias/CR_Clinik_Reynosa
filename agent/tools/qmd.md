# QMD retrieval

The `cr-clinik-agent` collection indexes `**/*.md` in this repository's `agent/` directory. Initial setup from the repository root (run the first line only if `qmd collection list` does not show the collection):

```powershell
qmd collection add agent --name cr-clinik-agent
qmd collection list
qmd update
qmd search "consultas signos vitales" -c cr-clinik-agent
qmd mcp
```

`qmd mcp` exposes the same local index to MCP clients over stdio. Configure the MCP client to launch the `qmd` executable with argument `mcp`; its tools include `status`, `query`, `get`, and `multi_get`. On 2026-11-11, MCP `status` showed collection `cr-clinik-agent` and MCP `query` retrieved `SYSTEM_MEMORY.md` for `fuera_de_horario consulta horario`. For future document changes, follow [`markdown-approval-and-indexing.md`](markdown-approval-and-indexing.md) before updating the index. Vector embeddings are optional; without them, use lexical `query`/`search`. Do not index `.env`, patient records, logs, or vendor dependencies.
