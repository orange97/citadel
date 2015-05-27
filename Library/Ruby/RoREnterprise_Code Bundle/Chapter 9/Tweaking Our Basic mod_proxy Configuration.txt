
<VirtualHost *:80> 
ServerName intranet.company.local 
ServerAlias www.intranet.company.local 
# Put the Apache logs in the shared Capistrano log directory 
ErrorLog /home/captain/apps/Intranet/shared/log/intranet-error.log 
CustomLog /home/captain/apps/Intranet/shared/log/intranet-access.log common 
# Point the DocumentRoot into the current public directory 
DocumentRoot /home/captain/apps/Intranet/current/public 
# Proxy all requests through to Mongrel 
ProxyPass / http://127.0.0.1:4000/ 
ProxyPassReverse / http://127.0.0.1:4000/ 
ProxyPreserveHost On 
ProxyRequests Off
</VirtualHost>


$ /etc/init.d/apache2.2 graceful


<Directory /home/captain/apps/Intranet/current/public> 
AllowOverride none 
Options FollowSymLinks 
Order allow,deny 
Allow from all
</Directory>


<VirtualHost *:80> 
ServerName intranet.company.local 
ServerAlias www.intranet.company.local 
# Put the Apache logs in the shared Capistrano log directory 
ErrorLog /home/captain/apps/Intranet/shared/log/intranet-error.log 
CustomLog /home/captain/apps/Intranet/shared/log/intranet-access.log common 
# Point the DocumentRoot into the current public directory 
DocumentRoot /home/captain/apps/Intranet/current/public 
# Turn on the rewrite engine 
RewriteEngine on 
# Useful for debugging rewriting 
RewriteLog /home/captain/apps/Intranet/shared/log/intranet-rewrite.log 
RewriteLogLevel 9 
# 1. If you're using page or action caching, 
# this directive will serve cached files direct from Apache 
RewriteRule ^([^.]+)$ $1.html [QSA] 
# 2. Check whether there is a file matching the request path 
RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} !-f 
# 3. Only triggered if no matching file found; proxy through 
# to Mongrel 
RewriteRule ^/(.*)$ http://127.0.0.1:4000%{REQUEST_URI} [P,QSA,L]
</VirtualHost>


