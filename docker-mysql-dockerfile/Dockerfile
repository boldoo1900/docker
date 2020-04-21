FROM mysql

# Add a database
ENV MYSQL_DATABASE testdb


# All scripts in docker-entrypoint-initdb.d/ are automatically
# executed during container startup
COPY ./execute-script.sql /docker-entrypoint-initdb.d/