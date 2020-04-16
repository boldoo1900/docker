FROM python:3.7-alpine

COPY ./mydir /app
WORKDIR /app

ENV FLASK_APP main.py
ENV FLASK_RUN_HOST 0.0.0.0

# RUN apk add --no-cache gcc musl-dev linux-headers

# install packages
COPY python/requirements.txt requirements.txt
RUN pip install -r requirements.txt

CMD ["flask", "run"]