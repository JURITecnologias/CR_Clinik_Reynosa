#!/bin/sh
set -eu

if [ -z "${APP_KEY:-}" ]; then
    APP_KEY="base64:$(head -c 32 /dev/urandom | base64 | tr -d '\n')"
    export APP_KEY
fi

# Prescription signing key (private.pem) is provided at runtime, never baked into the image.
RECETA_KEY_PATH=/var/www/html/backend/api-consulmdregister/storage/app/keys/private.pem
if [ -n "${RECETA_SIGNING_KEY_B64:-}" ] && [ ! -s "$RECETA_KEY_PATH" ]; then
    mkdir -p "$(dirname "$RECETA_KEY_PATH")"
    if ! printf '%s' "$RECETA_SIGNING_KEY_B64" | base64 -d > "$RECETA_KEY_PATH" 2>/dev/null; then
        rm -f "$RECETA_KEY_PATH"
        echo "ERROR: RECETA_SIGNING_KEY_B64 is not valid base64." >&2
        exit 1
    fi
    if ! grep -q "PRIVATE KEY" "$RECETA_KEY_PATH"; then
        rm -f "$RECETA_KEY_PATH"
        echo "ERROR: RECETA_SIGNING_KEY_B64 does not look like a PEM private key." >&2
        exit 1
    fi
    chmod 600 "$RECETA_KEY_PATH"
    chown www-data:www-data "$RECETA_KEY_PATH" 2>/dev/null || true
fi

exec "$@"
