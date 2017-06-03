#!/bin/sh

# Сlear containers:
docker rm -f $(docker ps -a -q)

# Сlear images:
docker rmi -f $(docker images -a -q)

# Remove all the dangling images:
docker rmi $(docker images -q -f dangling=true)

# Сlear volumes:
docker volume rm $(docker volume ls -q)

# Сlear networks:
docker network rm $(docker network ls | tail -n+2 | awk '{if($2 !~ /bridge|none|host/){ print $1 }}’)
