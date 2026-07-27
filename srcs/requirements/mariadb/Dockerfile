FROM debian:bookworm

WORKDIR /app

RUN	apt update  && apt install -y mariadb-server gettext-base

RUN sed -i "s|bind-address            = 127.0.0.1|bind-address            = 0.0.0.0|" /etc/mysql/mariadb.conf.d/50-server.cnf

COPY ./tools/entrypoint.sh .
COPY ./conf/init.sql .

CMD ["bash","entrypoint.sh"]
