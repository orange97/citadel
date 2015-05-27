
<div id="left_panel">
<h1><%= @page_title %></h1>
<p><strong>Job title:</strong> <%=d @person.job_title %></p>
...
<p><%= link_to 'Edit', :action => 'update', :id => @person %> | 
<%= link_to 'Delete', :action => 'delete', :id => @person %></p>
</div>


...
<%= link_to 'Delete', :action => 'delete', :id => @person %></p>
</div>
<div id="right_panel">
<h1>Tasks</h1>
</div>



#left_panel { 
float: left; 
width: 60%;
}
#right_panel { 
float: right; 
width: 39%; 
top: 0em; 
position: relative; 
background-color: #EEE; 
padding-left: 1%;
}



<div class="task">
<p><strong><%= task.title %></strong></p>
<p>(<%= datetime_span(task.start, task.end) %>)</p>
<%= content_tag('p', task.description) if task.description %>
<p><%= show_complete(task) %> | 
Owner: <%= task.user.username %></p>
<p><%= link_to 'Edit', :controller => 'tasks', :action => 'edit', 
:id => task.id %> | 
<%= link_to 'Delete', :controller => 'tasks', :action => 'confirm', 
:id => task.id %></p>
</div>


<div id="left_panel">
<h1>Tasks</h1>
<p><%= link_to 'Add a new task', :controller => 'tasks', :action => 'new', :default_person_id => @person.id %>
<% tasks = @person.tasks -%>
<% if tasks.empty? -%>
<p><strong>No tasks are associated with this person</strong></p>
<% else -%>
<% for task in tasks -%>
<%= render :partial => 'tasks/task', :locals => {:task => task} %>
<% end -%>
<% end -%>
</div>


class PeopleController < ApplicationController 
helper TasksHelper 
# ... other methods ...
end 

.task { 
padding: 0.5em 1em 0.5em 1em; 
margin-top: 0.5em; 
font-size: 0.9em;
}
.task p { 
margin: 0em;
}