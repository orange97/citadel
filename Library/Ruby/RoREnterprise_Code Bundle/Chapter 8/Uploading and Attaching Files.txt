
<h1><%= @page_title %></h1>
<% form_tag({:action => 'receive'}, {:multipart => true}) do -%>
<p>Select a file to upload:<br />
<%= file_field_tag('file_to_upload', :size => 40) %></p>
<p><%= submit_tag 'Upload' %></p>
<% end -%>

class UploadController < ApplicationController 
def index 
@page_title = 'Upload a file' 
end 
def receive 
# Get the uploaded file as an object. 
file_to_upload = params[:file_to_upload] 
# The full path to the file on the original filesystem. 
full_filename = file_to_upload.original_filename 
# Get the last part of the filename. 
short_filename = File.basename(full_filename) 
# Retrieve the content of the file. 
file_data = file_to_upload.read 
# Append a timestamp to the filename to ensure it's unique 
# and set the path to somewhere inside public/files. 
new_filename = File.join(RAILS_ROOT, 'public/files', 
Time.now.to_i.to_s + '_' + short_filename) 
# Save the file into a folder inside the Rails app. 
File.open(new_filename, 'w') { |f| f.write(file_data) } 
# Set the flash and direct back to index. 
redirect_to_index 'File uploaded successfully' 
end
end