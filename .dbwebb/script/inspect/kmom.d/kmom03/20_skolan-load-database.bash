#!/usr/bin/env bash

echo "Executing: mysql -udbwebb skolan < example/sql/inspect/setup_skolan.sql"
mysql -udbwebb skolan < example/sql/inspect/setup_skolan.sql

echo "Executing: mysql -udbwebb skolan < me/skolan/skolan.sql"
mysql -udbwebb skolan < me/skolan/skolan.sql
