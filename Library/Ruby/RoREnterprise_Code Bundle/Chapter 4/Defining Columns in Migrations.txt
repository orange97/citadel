
# column to store uploaded images up to 2Mb in size
t.column :image, :blob, :limit => 2.megabytes
# column to store prices (6 digits before decimal point, 2 after)
t.column :price, :decimal, :precision => 6, :scale => 2
# column to store whether someone's account is active (defaults to false)
t.column :account_active, :boolean, :default => false
# column to store someone's birth date (must not be null)
t.column :birth_date, :date, :null => false
