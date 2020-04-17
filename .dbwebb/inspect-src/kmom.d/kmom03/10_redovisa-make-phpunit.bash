#!/usr/bin/env bash

# Move to directory
cd me/redovisa || exit

echo "[$ACRONYM]"
make phpunit

echo
