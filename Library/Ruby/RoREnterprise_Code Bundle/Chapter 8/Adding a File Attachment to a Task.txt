
$ ruby script/generate controller file_attachments

class FileAttachmentsController < ApplicationController 
def receive 
# Get the task the file is to be attached to. 
task = Task.find(params[:task_id]) 
task_id = task.id 
# Get the ID of the person associated with the task; 
# we'll use this to redirect back to the task update view 
# for the person. 
person_id = task.person_id 
# Create the attachment. 
@new_attachment = FileAttachment.new(:task_id => task_id, 
:parent_id => task_id) 
@new_attachment.attributes = params[:new_attachment]

@new_attachment.save 
# Set the flash and direct back to update action 
# for task/person. 
flash[:notice] = 'File uploaded successfully' 
redirect_to :controller => 'tasks', :action => 'edit', 
:id => task_id, :person_id => person_id 
end
end