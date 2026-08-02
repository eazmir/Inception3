# Inception

*This project has been created as part of the 42 curriculum by eazmir.*

## Description

Inception is a 42 system administration project focused on learning containerization by deploying a complete web application with Docker.

Instead of installing software directly on the host machine, the application is split into independent services. Each service is built from its own Docker image and runs inside a separate container. Docker Compose is responsible for creating the containers, connecting them together, and managing their lifecycle.

The infrastructure includes the following components:

| Component | Role |
|---|---|
| **NGINX** | Receives HTTPS requests and forwards PHP requests |
| **WordPress (PHP-FPM)** | Generates dynamic web pages |
| **MariaDB** | Stores WordPress data permanently |

A dedicated Docker network enables communication between containers, while Docker volumes preserve data even if containers are recreated.

---

## Project Architecture

```text
           HTTPS
 Browser ─────────► NGINX
                       │
                       │ FastCGI
                       ▼
              WordPress (PHP-FPM)
                       │
                       │ MySQL
                       ▼
                  MariaDB
```

---

## Instructions

### Build and Launch the Project

```bash
make
```

### Stop All Running Services

```bash
make down
```

### Remove Containers, Images, and Volumes

```bash
make fclean
```

### Rebuild the Project from Scratch

```bash
make re
```

---

## Design Decisions

### Virtual Machines vs Docker

Virtual machines emulate an entire computer, including a complete operating system. Because every virtual machine has its own kernel, they require more memory, storage, and startup time.

Docker containers execute directly on the host kernel while remaining isolated from one another. This approach makes applications faster to launch, easier to distribute, and much lighter than virtual machines.

### Secrets vs Environment Variables

Environment variables are convenient for passing configuration values that are not confidential, such as ports, hostnames, or application settings.

Sensitive information should not be stored this way. Docker Secrets provide a safer mechanism by supplying confidential data through protected files that are only available to the containers that require them.

### Docker Network vs Host Network

The project uses a Docker bridge network so containers can communicate privately without exposing every service to the host machine. Docker also provides automatic DNS resolution, allowing containers to reach one another by service name.

Host networking removes this separation by placing the container directly on the host's network stack. Although this reduces networking overhead, it also removes an important layer of isolation.

### Docker Volumes vs Bind Mounts

Docker volumes are designed for persistent application data. Docker manages their location and lifecycle, making them reliable for databases and production deployments.

Bind mounts directly connect a host directory to a container. They are useful during development because changes appear immediately, but they depend on the host filesystem and are less portable across different environments.

---

## Resources

### Official Documentation

- Docker Documentation — https://docs.docker.com
- Docker Compose Documentation — https://docs.docker.com/compose
- NGINX Documentation — https://nginx.org/en/docs/
- MariaDB Documentation — https://mariadb.com/kb/en/documentation/
- WordPress Documentation — https://wordpress.org/documentation/
- PHP-FPM Documentation — https://www.php.net/manual/en/install.fpm.php
- OpenSSL Documentation — https://www.openssl.org/docs/

---

## AI Usage

AI was used as a learning assistant to:

- Learning Docker concepts and terminology.
- Understanding networking, storage, and container isolation.
- Reviewing configuration files for consistency.
- Improving the readability and organization of the documentation.
