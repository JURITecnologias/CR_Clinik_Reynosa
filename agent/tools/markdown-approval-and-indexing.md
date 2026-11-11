# Markdown approval and QMD indexing workflow

Use this procedure whenever an agent creates or changes a `.md` file in `agent/` (`plans/`, `prompts/`, `resources/`, or `tools/`). This repository uses **`agent/` singular**; `agents/` was the former directory name and is outside the `cr-clinik-agent` QMD collection.

## Gate: review before indexing

1. Prepare the document in `agent/` as `name.md.pending` while it is a draft; rename an already created `name.md` to that extension before any index refresh. The QMD collection matches `**/*.md`, so the pending extension prevents another `qmd update` from picking up the draft. The document owner/user must explicitly approve the content. A saved file, passing checks, or an agent's own review does not count as approval.
2. Review it against the current source files. Check links and paths, separate verified facts from assumptions, and remove patient data, credentials, tokens, private keys, logs, and production exports. For changes to system behavior, update `agent/SYSTEM_MEMORY.md` as needed.
3. Present the document and its material changes for review. Record the approval in the task conversation or the applicable review process. If edits are requested, revise and repeat the review. Do not run `qmd update` for the draft.
4. **After explicit approval**, rename `name.md.pending` to `name.md` and run the commands below from the repository root. If the file had already been indexed before the pending rename, remove that stale draft by running `qmd update` while it still has the pending extension; then refresh again after approval.

## Index the approved document

```powershell
# From D:\laragon\www\CR_Clinik_Reynosa
# Use the actual approved file path and name:
Rename-Item -LiteralPath "agent/plans/example.md.pending" -NewName "example.md"

qmd collection list

# Only if cr-clinik-agent is absent:
qmd collection add agent --name cr-clinik-agent

qmd update
qmd ls cr-clinik-agent

# Replace the example path with the new file's path relative to agent/:
qmd get qmd://cr-clinik-agent/plans/example.md

# Search for a distinctive, non-sensitive phrase from the approved document:
qmd search "distinctive approved phrase" -c cr-clinik-agent
qmd status
```

Confirm that `qmd get` returns the approved version and that search finds it. The QMD index is local to the machine; another agent or machine must create the collection and run `qmd update` there. The current QMD MCP server exposes `status`, `query`, `get`, and `multi_get` but no index-update tool: refresh with the CLI, then verify through MCP `status`, `query`, and `get`. If an MCP session was already open, query it again after the update to verify retrieval.

If the content changes after approval, treat the revision as a new draft and repeat the approval gate before reindexing. `qmd embed -c cr-clinik-agent` is optional for vector retrieval; lexical search works after `qmd update` without embeddings.
