#!/bin/sh
set -e

path="/var/www/html"
DB_PASSWORD=$(cat /run/secrets/password)
ADMIN_PASSWORD=$(cat /run/secrets/admin_password)

cd "$path"

if [ -z "$(ls -A "$path")" ]; then
	wp core download --allow-root

	until mysqladmin ping -h mariadb -u eazmir -p"${DB_PASSWORD}" --silent; do
		sleep 1
	done

	wp config create \
		--dbname="${DATABASE_NAME}" \
		--dbuser="${DATABASE_USER}" \
		--dbpass="${DB_PASSWORD}" \
		--dbhost="mariadb" \
		--allow-root

	wp core install \
		--url="localhost" \
		--title="my website" \
		--admin_user="${USER_ADMIN}" \
		--admin_password="${ADMIN_PASSWORD}" \
		--admin_email="${EMAIL_ADMIN}" \
		--allow-root
fi

chown -R www-data:www-data /var/www/html
exec php-fpm8.2 -F
# set -e

# path="/var/www/html"

# DB_PASSWORD=$(cat /run/secrets/password)

# cd $path

# if [ -z "$(ls -A "$path")" ]; 
# then
# 	wp core download --allow-root

# 	until mysqladmin ping -h mariadb -u eazmir -plx01 --silent; do
# 		sleep 1
# 	done

# 	wp config create \
# 		--dbname="${DATABASE_NAME}" \
# 		--dbuser="${DATABASE_USER}" \
# 		--dbpass="${DB_PASSWORD}" \
# 		--dbhost="mariadb" \
# 		--allow-root
	
# 	wp config create \
#     	--dbname="${DATABASE_NAME}" \
#     	--dbuser="${DATABASE_USER}" \
#     	--dbpass="lx01" \
#     	--dbhost="mariadb" \
#     	--allow-root

# 	wp core install \
# 		--url="localhost" \
# 		--title="my website" \
# 		--admin_user="${USER_ADMIN}" \
# 		--admin_password="lx01" \
# 		--admin_email="${EMAIL_ADMIN}" \
# 		--allow-root
# fi

# chown -R www-data:www-data /var/www/html
# exec php-fpm8.2 -F
