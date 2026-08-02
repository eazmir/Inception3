# USER DOCUMENTATION

## Services Provided

This project deploys a complete WordPress infrastructure using Docker Compose. The stack includes:

* **NGINX** – Web server responsible for serving the website over HTTPS.
* **WordPress** – Content management system powered by PHP-FPM.
* **MariaDB** – Relational database used to store WordPress data.

---

## Starting the Project

Build the Docker images and start all services:

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

## Rebuilding the Project

Remove the containers, delete all persistent data, and rebuild the infrastructure:

```bash
make re
```

---

## Accessing the Website

Once the project is running, open:

```text
https://<login>.42.fr
```

Example:

```text
https://eazmir.42.fr
```

---

## Accessing the WordPress Administration Panel

Open:

```text
https://<login>.42.fr/wp-admin
```

Log in using the administrator credentials configured during the WordPress installation.

---

## Credentials

The project stores sensitive information in the **secrets/** directory.

```
secrets/
├── credentials.txt
├── db_password.txt
└── db_root_password.txt
```

* `credentials.txt` contains the WordPress administrator and user credentials.
* `db_password.txt` contains the MariaDB user password.
* `db_root_password.txt` contains the MariaDB root password.

Ensure these files are created and populated with the correct values before running `make`.

---

## Checking the Services

Display the running containers:

```bash
docker ps
```

View the logs of each service:

```bash
docker logs nginx
docker logs wordpress
docker logs mariadb
```

---

## Persistent Data

The project uses bind-mounted Docker volumes to preserve data on the host machine.

* **WordPress files**

  * `/home/eazmir/data/wp-data`

* **MariaDB database**

  * `/home/eazmir/data/db-data`

These directories remain available even after the containers are removed. To delete all persistent data and perform a fresh installation, run:

```bash
make fclean
```
