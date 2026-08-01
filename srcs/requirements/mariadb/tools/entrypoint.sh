#!/bin/sh

set -e

export DB_PASSWORD=$(grep "db_password:" /run/secrets/passwords   | cut -d':' -f2)
export ROT_PASSWORD=$(grep "dbr_password:" /run/secrets/passwords | cut -d':' -f2)

mkdir -p /run/mysqld
mkdir -p /var/lib/mysql

chown -R mysql:mysql /run/mysqld
chown -R mysql:mysql /var/lib/mysql

if [ ! -d /var/lib/mysql/wp_db ];
then
	mariadbd --user=mysql &
	sleep 4
	envsubst < init.sql | mysql -u root
	mariadb-admin -u root --password="${ROT_PASSWORD}" shutdown
fi

exec mariadbd --user=mysql