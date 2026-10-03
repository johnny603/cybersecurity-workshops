## Requirements:
1. Docker > https://www.docker.com/get-started/

### To start the box:
```
docker build -t my-server . 
docker run -d \              
    --name my-server \
    -p 2222:22 \
    -p 2121:21 \
    -p 8000:8000 \
    -p 21000-21010:21000-21010 \
    -v "$(pwd)/www:/home/student" \
    my-server
```

### Use `nmap` to find the services, and `gobuster` to find hidden folders or files on the servers.

#### You are looking for three servers: FTP, SSH, HTTP
