all:
	mkdir -p /home/eazmir/data/wp-data
	mkdir -p /home/eazmir/data/db-data
	docker compose -f srcs/docker-compose.yml up --build

down:
	docker compose -f srcs/docker-compose.yml down

clean:
	docker compose -f srcs/docker-compose.yml down -v

fclean: clean
	sudo rm -rf /home/eazmir/data/wp-data
	sudo rm -rf /home/eazmir/data/db-data

re: fclean all

.PHONY: all down clean fclean re