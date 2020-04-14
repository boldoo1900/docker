

# build dockerfile
```
docker build -t simple-nginx .
```

# run container
```
docker run --rm -d -v ${PWD}/mydir:/usr/share/nginx/html -it -p 80:80 simple-nginx
	-d		(run container in background)
	-v		(volume replicate changes)
	--rm		(remove the container one its stopped)
	-it		(used to attach interactive TTY, tty -> text input output environment aka shell)
	-p 80:80	(map the port 80 from the container to our computer port 80)
```	

# goto container shell
```
docker exec -it <CONTAINER_ID> /bin/sh
```
