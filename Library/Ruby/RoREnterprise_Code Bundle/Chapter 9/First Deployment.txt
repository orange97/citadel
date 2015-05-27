
$ cap setup 
* executing task setup 
* executing "umask 02 &&\n mkdir -p /home/captain/apps/Intranet /home/captain/apps/Intranet/releases /home/captain/apps/Intranet/shared /home/captain/apps/Intranet/shared/system &&\n mkdir -p /home/captain/apps/Intranet/shared/log &&\n mkdir -p /home/captain/apps/Intranet/shared/pids" 
servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
command finished

$ cap cold_deploy

* executing task deploy 
* executing task update 
** transaction: start 
* executing task update_code 
* querying latest revision...
captain@192.168.13.129's password:
... 
* executing task spinner 
* executing "sudo -u app /home/captain/apps/Intranet/current/ script/spin" 
servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
** [out :: 192.168.13.129] sudo: 
** [out :: 192.168.13.129] no passwd entry for app! 
command finished
command "sudo -u app /home/captain/apps/Intranet/current/script/spin" failed on 192.168.13.129

no passwd entry for app!

