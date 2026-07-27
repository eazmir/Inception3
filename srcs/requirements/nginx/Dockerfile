FROM debian:bookworm

RUN 	apt update && apt install -y nginx

COPY conf/nginx.conf /etc/nginx/sites-enabled/nginx.conf

CMD ["nginx","-g","daemon off;"]	
