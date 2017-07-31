# HTTP Error Pages

In an effort to make HTTP error pages look a little prettier without going overboard, I made this. It's essentially a PHP script that checks the status code and shows a simple page based on it. It currently handles 4xx- and 5xx-code errors.

![Screenshot](https://raw.githubusercontent.com/blieque/http-errors/master/screenshot.png)

Feel free to modify and use it yourself, as per the license.

## Configuration

The project was developed for nginx, but there's no particular reason why it couldn't be used with other webservers. If you are using nginx, however, I have two configuration files that'll come in handy: [`http-errors.conf`](https://github.com/blieque/nginx-config/blob/master/nginx/snippets/http-errors.conf) and [`fastcgi-php.conf`](https://github.com/blieque/nginx-config/blob/master/nginx/snippets/fastcgi-php.conf). You'll need to copy the `http-errors` directory from the repository to `/srv/common/public/`, or copy it somewhere else and tweak the first config file.
