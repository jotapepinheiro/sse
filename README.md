## Note about running this example through **NGINX**:

By default `fastcgi_buffering` is ON, thus you have to add `fastcgi_buffering off;` to the appropriate `location` block for this example to work.

Similarly, if you use a reverse proxy, `proxy_buffering` is ON by default, thus you have to add `proxy_buffering off;`.

# Execute Project

```shell script
php -S 127.0.0.1:8000
```
