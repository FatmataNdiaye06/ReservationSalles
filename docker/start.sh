#!/bin/sh
set -e

cat > /usr/local/etc/php-fpm.d/zz-docker.conf <<'EOF'
[global]
daemonize = no

[www]
listen = 0.0.0.0:9000
EOF

PORT="${PORT:-10000}"

cat > /etc/nginx/conf.d/default.conf <<EOF
server {
    listen 0.0.0.0:${PORT};
    index index.php index.html;
    root /var/www/html/public;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php\$ {
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }
}
EOF

php-fpm -D
sleep 1
nginx -t
exec nginx -g "daemon off;"