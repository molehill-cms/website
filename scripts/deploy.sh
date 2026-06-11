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
curl --insecure $SITE_ROOT/ > $SCRIPT_DIR/../static/index.html

### Push to 'deploy' branch.
cd $SCRIPT_DIR/../static/
git add .
git commit -m 'deployed'.
git push origin