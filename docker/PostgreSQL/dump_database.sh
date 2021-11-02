#! /bin/sh

docker exec tube-loader-postgresql pg_dump --user=tube-loader-user tube-loader-db > ./db.dump
