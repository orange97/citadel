
$ cap migrate 
* executing task migrate 
* executing "cd /home/captain/apps/Intranet/current && rake RAILS_
ENV=production db:migrate" 
servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
** [out :: 192.168.13.129] (in /home/captain/apps/Intranet/releases/20070413171324) 
** [out :: 192.168.13.129] rake aborted! 
** [out :: 192.168.13.129] Unknown MySQL server host 'localhosti' (1) 
** [out :: 192.168.13.129] (See full trace by running task with --trace) 
command finished
command "cd /home/captain/apps/Intranet/current && rake RAILS_ENV=production db:migrate" failed on 192.168.13.129

