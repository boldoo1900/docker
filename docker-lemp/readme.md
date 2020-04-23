



# reference
```
https://qiita.com/annyamonnya/items/84f3f8da6decd2cf685c#4-master-%E3%81%A7-dump-%E3%82%92%E3%81%A8%E3%82%8B

https://lefred.be/content/master-slave-replication-with-mysql-8-0-in-2-mins/
https://linuxize.com/post/how-to-configure-mysql-master-slave-replication-on-centos-7/

- docker-nginx-php-mysql
https://github.com/nanoninja/docker-nginx-php-mysql

- phpmyadmin (fpm-alpine)
https://github.com/phpmyadmin/docker/issues/253
```

# database ERD
```
https://www.lucidchart.com/invitations/accept/6f35e696-f65f-4071-8f7f-3e48fb8d2eb3
```

# nginx settings
```
location / {
    try_files $uri $uri/ /index.php?$args;
}
```