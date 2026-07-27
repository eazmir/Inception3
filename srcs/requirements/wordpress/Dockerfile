FROM debian:bookworm

WORKDIR /app

RUN 	apt update && \
	apt install -y php \
	php-fpm \
	php-mysql \
	curl \
	mariadb-client

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar

RUN sed -i 's|listen = /run/php/php8.2-fpm.sock|listen = 9000|' /etc/php/8.2/fpm/pool.d/www.conf

RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

COPY ./tools/entrypoint.sh .

CMD ["bash","entrypoint.sh"]	
