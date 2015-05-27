
<Proxy balancer://intranet_cluster> 
BalancerMember http://127.0.0.1:4000 
BalancerMember http://127.0.0.1:4001 
BalancerMember http://127.0.0.1:4002
</Proxy>


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
# Static files can be served straight off the filesystem 
RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} !-f 
RewriteRule ^/(.*)$ balancer://intranet_cluster%{REQUEST_URI} [P,QSA,L]
</VirtualHost>


$ sudo /etc/init.d/apache2.2 graceful


user: captain
cwd: /home/captain/apps/Intranet/current/
port: "4000"
environment: production
group: captain
address: 127.0.0.1
pid_file: /home/captain/apps/Intranet/shared/pids/mongrel.pid
servers: 3
debug: true


Fri Jun 15 12:13:06 BST 2007 REQUEST /people
--- !map:Mongrel::HttpParams
SERVER_NAME: 127.0.0.1
HTTP_MAX_FORWARDS: "10"
PATH_INFO: /people
HTTP_X_FORWARDED_HOST: intranet.company.local
HTTP_USER_AGENT: ApacheBench/2.0.40-dev
SCRIPT_NAME: /
SERVER_PROTOCOL: HTTP/1.1
HTTP_HOST: 127.0.0.1:4002
REMOTE_ADDR: 192.168.13.1
...
HTTP_X_FORWARDED_SERVER: intranet.company.local
REQUEST_URI: /people
SERVER_PORT: "4002"
...


class ApplicationController < ActionController::Base 
# ... other methods ... 
before_filter do |controller| 
controller.instance_variable_set(:@host_and_port,
controller.request.env['HTTP_HOST']) 
end 
# ...
end


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_GB" xml:lang="en_GB">
<head>
<title><%= @page_title || 'Intranet' %> on 
<%= @host_and_port %></title>
...


