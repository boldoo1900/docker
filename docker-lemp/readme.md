# Nginx PHP MySQL

Docker running Nginx, PHP-FPM, MySQL and PHPMyAdmin.


## Overview

1. [Install prerequisites](#install-prerequisites)

    Before installing project make sure the following prerequisites have been met.

2. [Use Docker Commands](#use-docker-commands)

    Basic docker commands to work with project

3. [Reference Problems](#reference-problems)

___

## Install prerequisites

The most important packages :

* [Docker](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install/)

### Images to use

* [Nginx](https://hub.docker.com/_/nginx/)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHP-FPM](https://hub.docker.com/r/nanoninja/php-fpm/)
* [PHPMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)

### Usage Ports :

| Server     | Port |
|------------|------|
| MySQL      | 3306 |
| PHPMyAdmin | 8000 |
| Nginx      | 8000 |

### Project tree

```sh
.
├── Dockerfile
├── config
│   ├── default.conf
│   ├── mysql-master.cnf
│   ├── mysql-slave.cnf
│   ├── php-dockerfile
│   └── php.ini
├── data
│   └── master
├── docker-compose.yml
├── readme.md
├── sql
│   ├── ddl.sql
│   └── dml.sql
└── workdir
    ├── phpmyadmin
    └── simpleapp

```

### Configure Nginx 

1. php configuration
```sh
    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
```

2. phpmyadmin configuration
```sh
    location ^~ /phpmyadmin {
        alias /var/www/html/phpmyadmin;
        index index.php;
        location ~ \.php$ {
            try_files      $uri = 404;
            include        fastcgi_params;
            fastcgi_split_path_info ^\/phpmyadmin\/(.+\.php)(.*)$;
            fastcgi_param  SCRIPT_FILENAME $fastcgi_script_name;
            fastcgi_pass   $upstream;
        }
    }
```

### Database ERD
```
https://www.lucidchart.com/invitations/accept/6f35e696-f65f-4071-8f7f-3e48fb8d2eb3
```

___


## Use Docker commands

### build & run

```sh
sudo docker-compose build/up/down/restart -d
```

### Checking installed PHP extensions

```sh
sudo docker-compose exec php php -m
```

### MySQL shell access

```sh
sudo docker exec -it mysql bash
```


## Reference Problems

1. MySQL Replication

```sh
https://qiita.com/annyamonnya/items/84f3f8da6decd2cf685c#4-master-%E3%81%A7-dump-%E3%82%92%E3%81%A8%E3%82%8B
https://lefred.be/content/master-slave-replication-with-mysql-8-0-in-2-mins/
https://linuxize.com/post/how-to-configure-mysql-master-slave-replication-on-centos-7/
```

2. LEMP example

```sh
https://github.com/nanoninja/docker-nginx-php-mysql
```

3. PhpMyAdmin alpine & nginx configuration solution

```sh
https://github.com/phpmyadmin/docker/issues/253
```

4. Apache mod_rewrite on nginx solution

```sh
location / {
    try_files $uri $uri/ /index.php?$args;
}
```