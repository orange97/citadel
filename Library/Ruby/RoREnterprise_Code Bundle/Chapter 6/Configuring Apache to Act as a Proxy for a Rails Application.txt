
$ a2enmod proxy

$ /etc/init.d/apache2 force-reload


LoadModule proxy_module modules/mod_proxy.so
#LoadModule proxy_ajp_module modules/mod_proxy_ajp.so

LoadModule proxy_module modules/mod_proxy.so
#LoadModule proxy_ajp_module modules/mod_proxy_ajp.so
#LoadModule proxy_balancer_module modules/mod_proxy_balancer.so
#LoadModule proxy_connect_module modules/mod_proxy_connect.so
LoadModule proxy_http_module modules/mod_proxy_http.so
#LoadModule proxy_ftp_module modules/mod_proxy_ftp.so

<VirtualHost www.companyname.local:80> 
ServerName www.companyname.local 
ServerAlias www.companyname.local 
ProxyPass / http://www.companyname.local:4000/ 
ProxyPassReverse / http://www.companyname.local:4000 
ProxyPreserveHost on
</VirtualHost>

ProxyPass /images ! 
ProxyPass /stylesheets !

Alias /images /path/to/public/images
Alias /stylesheets /path/to/public/stylesheets
