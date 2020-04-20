


# mysql replication
```
master
/sql/mysql-master.cnf => /etc/mysql/conf.d/mysql.cnf

slave 
/sql/mysql-slave.cnf => /etc/mysql/conf.d/mysql.cnf
```

# replication settings
```
master
CREATE USER 'repl'@'%' IDENTIFIED WITH caching_sha2_password BY '123';
GRANT REPLICATION SLAVE ON *.* TO 'repli'@'%';

show master status;

slave
CHANGE MASTER TO MASTER_HOST='mydb-master', MASTER_USER='repl', MASTER_PASSWORD='123', MASTER_LOG_FILE='mysql-bin.000001', MASTER_LOG_POS=1427;
CHANGE MASTER TO GET_MASTER_PUBLIC_KEY=1;       // mysql 8 latter


show slave status\G;
```

# diagnostic program
```
mysqlslap -u root -p 123 -P 3306 -h localhost --auto-generate-sql --iterations=10 --concurrency=10

--auto-generate-sql =  automatically generate and execute SQL statements
--iteractions = number of tests to run
--concurrency = number of clients


-- Small performance test, add following lines to my.cnf. It will improve average number of seconds to run queries
innodb_buffer_pool_size=10M   
innodb_doublewrite = 0
innodb_flush_log_at_trx_commit= 0
skip-log-bin
skip_slow_query_log

```

# reference
```
https://qiita.com/annyamonnya/items/84f3f8da6decd2cf685c#4-master-%E3%81%A7-dump-%E3%82%92%E3%81%A8%E3%82%8B

https://lefred.be/content/master-slave-replication-with-mysql-8-0-in-2-mins/
https://linuxize.com/post/how-to-configure-mysql-master-slave-replication-on-centos-7/

```

# database ERD
```
https://www.lucidchart.com/invitations/accept/6f35e696-f65f-4071-8f7f-3e48fb8d2eb3
```