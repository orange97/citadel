
<h2>File attachments</h2>
<% form_for 'new_attachment', :url => {:controller => 'file_attachments', 
:action => 'receive', :task_id => task.id}, 
:html => {:multipart => true} do |f| %>
<p>Upload a new attachment:<br />
<%= f.file_field(:uploaded_data, :size => 20) %></p>
<p><%= submit_tag 'Save' %></p>
<% end %>


<div id="left_panel">
<% form_for :task, @task, :url => {:action => 'update', :id => @task.id} 
do |f| %>
<%= render :partial => 'form', :locals => {:f => f} %>
<% end %>
</div>
<div id="right_panel">
<%= render :partial => 'file_attachments/form', 
:locals => {:task => @task} %>
</div>

