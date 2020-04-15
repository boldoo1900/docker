

build dockerfile
```
docker build -t test-flask .
```

run docker
```
docker run --rm -d -p 5000:5000 --name test-flask-container -v ${PWD}/mydir:/app test-flask

with network 
docker run --rm -d --network test-network -p 80:5000 -v ${PWD}/mydir:/app --name test-flask-container test-flask
```

# docker-compose run
```
docker-compose run --rm -p 80:5000 webserver
```

