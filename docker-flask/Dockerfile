FROM ubuntu:18.04
#FROM tiangolo/uwsgi-nginx-flask:python3.6-alpine3.7

RUN apt-get update -y
RUN apt-get install -y python-pip python-dev build-essential

COPY . /app
WORKDIR /app

RUN pip install -r requirements.txt

ENTRYPOINT ["python"]

CMD ["main.py"]

