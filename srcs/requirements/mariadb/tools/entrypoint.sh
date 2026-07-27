#!/bin/sh

set -e

export DB_PASSWORD=$(head -1 /run/secrets/passwords)

mkdir -p /run/mysqld
mkdir -p /var/lib/mysql

chown -R mysql:mysql /run/mysqld
chown -R mysql:mysql /var/lib/mysql

mariadbd --user=mysql &

if [ ! -d /var/lib/mysql/wp_db ];
then
	sleep 4
	envsubst < init.sql | mysql -u root
	mariadb-admin -u root --password="${DB_PASSWORD}" shutdown
fi

exec mariadbd --user=mysql
