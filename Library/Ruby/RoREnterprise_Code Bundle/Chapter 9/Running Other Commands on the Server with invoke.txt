
$ export COMMAND="cd /home/captain/apps/Intranet/current; \
mongrel_rails start -d -e production -p 4000 \
-P /home/captain/apps/Intranet/shared/pids/mongrel.pid"
$ export ROLES=app
$ cap invoke


* executing task invoke 
* executing "mongrel_rails start -d -e production -p 4000 -P /home/captain/apps/Intranet/shared/pids/mongrel.pid" 
servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
command finished