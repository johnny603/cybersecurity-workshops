FROM python:3.10-slim
RUN apt-get update && pip install flask
WORKDIR /app
COPY .. /app
CMD ["flask","run","--host=0.0.0.0"]
