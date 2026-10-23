FROM python:3.10-slim
RUN apt-get update && apt-get install -y netcat-openbsd && pip install flask
WORKDIR /app
COPY ./app /app
CMD ["flask","run","--host=0.0.0.0"]
