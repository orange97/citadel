
# ServerName www.company.local:80 
NameVirtualHost 10.0.0.1 
<VirtualHost www.company.local:80> 
ServerName www.company.local 
DocumentRoot "C:/Program Files/Apache Software Foundation/ Apache2.2/htdocs" 
</VirtualHost> 
<VirtualHost intranet.company.local:80> 
ServerName intranet.company.local 
ServerAlias intranet.company.local 
ProxyPass / http://intranet.company.local:4000/ 
ProxyPassReverse / http://intranet.company.local:4000 
ProxyPreserveHost on 
</VirtualHost>
