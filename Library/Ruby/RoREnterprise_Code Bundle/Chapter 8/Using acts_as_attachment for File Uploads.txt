
class CreateFileAttachments < ActiveRecord::Migration 
def self.up 
create_table :file_attachments do |t| 
t.column "content_type", :string 
t.column "filename", :string 
t.column "size", :integer 
t.column "task_id", :integer 
t.column "parent_id", :integer 
end 
end 
def self.down 
drop_table :file_attachments 
end
end

$ rake db:migrate

class FileAttachment < ActiveRecord::Base 
belongs_to :task 
acts_as_attachment :storage => :file_system, 
:max_size => 10.megabytes, 
:file_system_path => 'public/files' 
validates_as_attachment
end

class Task < ActiveRecord::Base 
belongs_to :person 
belongs_to :user 
has_many :file_attachments, :dependent => :destroy, 
:order => 'filename' 
# ... other methods ...
end

