#!/bin/sh
set -e

path="/var/www/html"

DB_PASSWORD=$(grep "db_password:" /run/secrets/passwords | cut -d':' -f2)
ADMIN_PASSWORD=$(grep "admin_password:" /run/secrets/passwords | cut -d':' -f2)
USER_PASSWORD=$(grep "user_passwowrd:" /run/secrets/passwords | cut -d':' -f2)

cd "$path"

if [ ! -f /var/www/html/wp-config.php ]; 
then
	wp core download --allow-root

	until mysqladmin ping -h mariadb -u eazmir -p"${DB_PASSWORD}" --silent; 
	do
		sleep 1
	done

	wp config create \
		--dbname="${DATABASE_NAME}" \
		--dbuser="${DATABASE_USER}" \
		--dbpass="${DB_PASSWORD}" \
		--dbhost="${DB_HOST}" \
		--allow-root

	wp core install \
		--url="${DOMAIN_NAME}" \
		--title="${SITE_TITLE}" \
		--admin_user="${ADMIN_USERNAME}" \
		--admin_password="${ADMIN_PASSWORD}" \
		--admin_email="${ADMIN_EMAIL}" \
		--allow-root

		if ! wp user get "${USER_PASSWORD}" --allow-root >/dev/null 2>&1;
		then
			wp user create \
				"${USER_NAME}" \
				"${USER_EMAIL}" \
				--role=author \
				--user_pass="${USER_PASSWORD}" \
				--allow-root
		fi
		chown -R www-data:www-data /var/www/html
fi

exec php-fpm8.2 -F