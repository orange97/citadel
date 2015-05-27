
$ cap migrate 
* executing task migrate 
* executing "cd /home/captain/apps/Intranet/current && rake RAILS_ENV=production db:migrate" 
servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
** [out :: 192.168.13.129] (in /home/captain/apps/Intranet/releases/20070413171324) 
** [out :: 192.168.13.129] == CreatePeople: migrating ==================================================== 
** [out :: 192.168.13.129] -- create_table(:people) 
** [out :: 192.168.13.129] -> 0.0831s 
** [out :: 192.168.13.129] == CreatePeople: migrated (0.0837s) ===========================================
... 
