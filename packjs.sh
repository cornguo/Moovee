#!/bin/sh
./packjs/jsmin/jsmin < devel/func.js > func-min.js
php packjs/packer/pack.php func-min.js func.js
rm -f func-min.js

