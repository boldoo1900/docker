https://www.digitalocean.com/community/tutorials/how-to-run-nginx-in-a-docker-container-on-ubuntu-14-04

# build dockerfile
docker build -t simple-nginx .

# run container
docker run --rm -v ${PWD}/mydir:/usr/share/nginx/html -it -p 80:80 simple-nginx
	-v		(volume replicate changes)
	--rm		(remove the container one its stopped)
	-it		(used to attach interactive TTY, tty -> text input output environment aka shell)
	-p 80:80	(map the port 80 from the container to our computer port 80)
	