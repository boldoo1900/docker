

build dockerfile
```
    docker build -t simple-flask .
```

run docker
```
    docker run -p 5000:5000 -v ${PWD}/mydir:/app simple-flask
```