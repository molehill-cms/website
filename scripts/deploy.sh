#!/bin/sh

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

cp -r $SCRIPT_DIR/../public/ $SCRIPT_DIR/../deploy/
find $SCRIPT_DIR/../deploy/ -name '*.php' -delete
find $SCRIPT_DIR/../deploy/ -name '.htaccess' -delete

curl --insecure https://molehill-cms.local:8890/ > $SCRIPT_DIR/../deploy/index.html