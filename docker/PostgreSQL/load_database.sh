#! /bin/sh

docker exec -i tube-loader-postgresql psql --user=tube-loader-user tube-loader-db < ./db.dump
