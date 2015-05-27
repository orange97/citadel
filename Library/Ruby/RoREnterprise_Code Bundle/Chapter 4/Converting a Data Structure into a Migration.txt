
def self.up 
create_table :people do |t| 
t.column :title, :string 
t.column :first_name, :string, :null => false 
t.column :last_name, :string, :null => false 
t.column :email, :string, :limit => 100, :null => false 
t.column :telephone, :string, :limit => 50 
t.column :mobile_phone, :string, :limit => 50 
t.column :job_title, :string 
t.column :date_of_birth, :date 
t.column :gender, :string, :limit => 1
t.column :keywords, :string 
t.column :notes, :text 
t.column :address_id, :integer 
t.column :company_id, :integer 
t.column :created_at, :timestamp 
t.column :updated_at, :timestamp 
end
end
