#!/usr/bin/env bash

# Move to directory
cd me/redovisa || exit
e() { exit; }; export -f e

echo "[$ACRONYM] Do manual stuff, if needed (e/exit to exit)?"
ls -F
bash
