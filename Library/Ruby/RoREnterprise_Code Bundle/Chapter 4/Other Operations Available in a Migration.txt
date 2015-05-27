
# drop any existing people table and recreate from scratch 
create_table(:people, :force => true) 
# create a table with table type "MyISAM" (Rails defaults to InnoDB) 
# using a UTF-8, case-insensitive collation (NB this is 
# MySQL-specific, but the :options argument can be 
# used to pass any other database-specific table creation SQL) 
create_table(:people, :options => 'ENGINE MyISAM COLLATE utf8_unicode_ci') 
# rename the primary key to pid (if you don't want or haven't 
# got an ID field in the table) 
create_table(:people, :primary_key => 'pid')
