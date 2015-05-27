
<h2>File attachments</h2>
<% form_tag :controller => 'file_attachments', 
:action => 'remove', :task_id => task.id do %>
<% unless task.file_attachments.empty? -%>
<p><em>Tick boxes to select attachments to delete</em></p>
<% for attachment in task.file_attachments -%>
<p>
<%= check_box_tag 'attachments_to_remove[]', attachment.id, false,
:id => 'attachments_to_remove_' + attachment.id.to_s %> 
<%= link_to attachment.filename, attachment.public_filename %>
</p>
<% end -%>
<%= submit_tag 'Delete' %>
<% else -%>
<p><strong>No attachments</strong></p>
<% end -%>
<% end -%>
<p><strong>OR</strong></p>
<% form_for 'new_attachment', :url => {:controller => 'file_attachments', 
:action => 'receive', :task_id => task.id}, 
:html => {:multipart => true} do |f| %>
...


class FileAttachmentsController < ApplicationController 
before_filter :prepare 
def receive 
@new_attachment = FileAttachment.new(:task_id => @task_id, 
:parent_id => @task_id) 
@new_attachment.attributes = params[:new_attachment] 
@new_attachment.save 
# Set the flash and direct back to update action for task. 
flash[:notice] = 'File uploaded successfully' 
redirect_to_person_task 
end 
def remove 
FileAttachment.destroy params[:attachments_to_remove]
flash[:notice] = 'Attachments removed' 
redirect_to_person_task 
end 
private 
def redirect_to_person_task 
redirect_to :controller => 'tasks', :action => 'edit', 
:id => @task_id, :person_id => @person_id 
end 
private 
def prepare 
task = Task.find(params[:task_id]) 
@task_id = task.id 
@person_id = task.person_id 
end
end