# DEVELOPER DOCUMENTATION

## Prerequisites

The following software must be installed before building the project:

* Linux virtual machine
* Docker
* Docker Compose

Verify the installation:

```bash
docker --version
docker compose version
```

---

## Repository Structure

```text
.
├── Makefile
├── README.md
├── USER_DOC.md
├── DEV_DOC.md
├── secrets
│   ├── credentials.txt
│   ├── db_password.txt
│   └── db_root_password.txt
└── srcs
    ├── docker-compose.yml
    └── requirements
        ├── mariadb
        ├── nginx
        └── wordpress
```

The `srcs/` directory contains the Docker Compose file and the configuration for each service.

---

## Configuration

The project uses Docker secrets to provide sensitive information to the containers.

Required secret files:

```text
secrets/
├── credentials.txt
├── db_password.txt
└── db_root_password.txt
```

* `credentials.txt` contains the WordPress administrator and user credentials.
* `db_password.txt` contains the MariaDB user password.
* `db_root_password.txt` contains the MariaDB root password.

These files must exist before running `make`.

---

## Building the Project

Build the Docker images and start the infrastructure:

```bash
make
```

---

## Stopping the Project

Stop and remove the running containers:

```bash
make down
```

---

## Cleaning the Project

Remove the containers, Docker volumes, and all persistent data stored on the host:

```bash
make fclean
```

To rebuild everything from scratch:

```bash
make re
```

---

## Useful Docker Commands

List running containers:

```bash
docker ps
```

List Docker volumes:

```bash
docker volume ls
```

List Docker networks:

```bash
docker network ls
```

Display container logs:

```bash
docker logs <container_name>
```

Open a shell inside a container:

```bash
docker exec -it <container_name> sh
```

---

## Persistent Data

The project uses bind-mounted Docker volumes.

WordPress data is stored on the host at:

```text
/home/eazmir/data/wp-data
```

MariaDB data is stored on the host at:

```text
/home/eazmir/data/db-data
```

These directories preserve data even after containers are removed. Running `make fclean` deletes these directories and creates a fresh environment.

---

## Container Communication

The services communicate through the Docker network created by Docker Compose.

Communication between services is performed using Docker's internal DNS:

```text
nginx      → wordpress
wordpress  → mariadb
```

Containers communicate using their service names defined in `docker-compose.yml`; no host networking is used.
