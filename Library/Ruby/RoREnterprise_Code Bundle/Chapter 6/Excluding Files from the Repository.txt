
$ svn remove log/*
$ svn propset svn:ignore "*.log" log/
$ svn update log/
$ svn remove tmp/*
$ svn propset svn:ignore "*" tmp/
$ svn update tmp/
$ svn commit -m "remove log and tmp files and ignore them in future"
