#!/bin/bash

docker-compose exec --user www-data phpfpm wp "$@"