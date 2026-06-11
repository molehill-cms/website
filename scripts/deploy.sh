#!/bin/sh

### A script to statically deploy the website to GitHub Pages.

set -e

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
SITE_ROOT=https://molehill-cms.local:8890

### Copy over static files.
mkdir -p $SCRIPT_DIR/../static/
cp -r $SCRIPT_DIR/../public/ $SCRIPT_DIR/../static/
find $SCRIPT_DIR/../static/ -name '.htaccess' -delete
find $SCRIPT_DIR/../static/ -name '*.php' -delete

### Download pages.
cd $SCRIPT_DIR/../content/
find ./ -name "_index.md" -print | while read -r FILE; do
    mkdir -p "$SCRIPT_DIR/../static/$(dirname "$FILE")"
    curl --insecure "$SITE_ROOT/$(dirname "$FILE")" > "$SCRIPT_DIR/../static/$(dirname "$FILE")/index.html"
done
find ./ -name "*.md" -not -name "_index.md" -print | while read -r FILE; do
    mkdir -p "$SCRIPT_DIR/../static/$(dirname "$FILE")/$(basename "$FILE" .md)"
    curl --insecure "$SITE_ROOT/$(dirname "$FILE")/$(basename "$FILE" .md)" > "$SCRIPT_DIR/../static/$(dirname "$FILE")/$(basename "$FILE" .md)/index.html"
done

### Push to 'deploy' branch.
cd $SCRIPT_DIR/../static/
git add .
git commit -m 'deployed'.
git push origin