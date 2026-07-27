#!/bin/sh
set -e

path="/var/www/html"

DB_PASSWORD=$(head -1 /run/secrets/passwords)
ADMIN_PASSWORD=$(cat /run/secrets/passwords  | head -2 | tail -1)
USER_PASSWORD=$(cat /run/secrets/passwords | tail -1)

cd "$path"

# if [ -z "$(ls -A "$path")" ]; 
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
		--url="${DOMAINE_NAME}" \
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