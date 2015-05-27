
$ cap rollback

$ cap -s migrate_env="VERSION=7" migrate 
* executing task migrate 
* executing "cd /home/captain/apps/Intranet/current && rake RAILS_ENV=production VERSION=7 db:migrate"
servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
** [out :: 192.168.13.129] (in /home/captain/apps/Intranet/releases/20070502221404) 
** [out :: 192.168.13.129] == DefaultAdminUser: reverting =============================================== 
** [out :: 192.168.13.129] == DefaultAdminUser: reverted (0.2761s) ====================================== 
command finished




