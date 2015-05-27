
Owner: <%= task.user.username %></p>
<div class="file_attachments_for_task">
<p><strong>File attachments</strong></p>
<% unless task.file_attachments.empty? -%>
<% for attachment in task.file_attachments -%>
<p>
<%= link_to attachment.filename, attachment.public_filename %>
</p>
<% end -%>
<% else -%>
<p>None</p>
<% end -%>
</div>
...


.file_attachments_for_task { 
background-color: #DDD; 
padding: 0.5em;
}


