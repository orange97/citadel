
$ cap cleanup

$ cap cleanup 
... 
* executing "sudo rm -rf /home/captain/apps/Intranet/releases/20070428153649" servers: ["192.168.13.129"] 
[192.168.13.129] executing command 
** [out :: 192.168.13.129] captain is not in the sudoers file. This incident will be reported. 
...

set :use_sudo, false