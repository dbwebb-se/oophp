#!/usr/bin/env bash
cd me/kmom01 || exit
e() { exit; }
export -f e

echo "Do manual stuff, if needed (write e/exit to exit)?"
ls -l
bash
