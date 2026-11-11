# QMD retrieval

The `cr-clinik-agent` collection indexes `**/*.md` in this repository's `agent/` directory. QMD collections are machine-local and tied to an absolute checkout path. From the intended repository root, first inspect the collection:

```powershell
qmd collection list
qmd collection show cr-clinik-agent

# Only if the collection is absent, add this checkout:
qmd collection add agent --name cr-clinik-agent

# After document approval (see the workflow below):
qmd update
qmd search "consultas signos vitales" -c cr-clinik-agent
qmd mcp
```

If `qmd collection show` points to another worktree, choose a distinct collection name for this checkout (for example `cr-clinik-agent-main`) and use that name in later commands; do not accidentally refresh the other worktree. `qmd mcp` exposes the same local index to MCP clients over stdio. Configure the MCP client to launch the `qmd` executable with argument `mcp`; its tools include `status`, `query`, `get`, and `multi_get`. For document changes, follow [`markdown-approval-and-indexing.md`](markdown-approval-and-indexing.md) before updating the index. Vector embeddings are optional; without them, use lexical `query`/`search`. Do not index `.env`, patient records, logs, or vendor dependencies.
