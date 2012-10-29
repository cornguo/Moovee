#!/bin/sh
./packjs/jsmin/jsmin < devel/func.test.js > func-min.js
php packjs/packer/pack.php func-min.js func.test.js
rm -f func-min.js

