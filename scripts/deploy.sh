#!/bin/sh

set -e

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

cp -r $SCRIPT_DIR/../public/ $SCRIPT_DIR/../static/
find $SCRIPT_DIR/../static/ -name '*.php' -delete
find $SCRIPT_DIR/../static/ -name '.htaccess' -delete

curl --insecure https://molehill-cms.local:8890/ > $SCRIPT_DIR/../static/index.html