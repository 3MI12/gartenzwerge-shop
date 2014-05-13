#!/bin/bash
php vendor/bin/doctrine orm:validate-schema
php vendor/bin/doctrine orm:schema-tool:drop --force
php vendor/bin/doctrine orm:schema-tool:create

