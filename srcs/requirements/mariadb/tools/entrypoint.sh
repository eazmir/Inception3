#!/bin/sh

set -e

export DB_PASSWORD=$(cat /run/secrets/db_password)
export ROOT_PASSWORD=$(cat /run/secrets/db_root_password)

mkdir -p /run/mysqld
mkdir -p /var/lib/mysql

chown -R mysql:mysql /run/mysqld
chown -R mysql:mysql /var/lib/mysql

if [ ! -d /var/lib/mysql/wp_db ];
then
	mariadbd --user=mysql &
	sleep 4
	envsubst < init.sql | mysql -u root
	mariadb-admin -u root --password="${ROOT_PASSWORD}" shutdown
fi

exec mariadbd --user=mysql