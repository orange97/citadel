
index.rhtml:
<h1><%= @page_title %></h1>
<table>
<tr>
<th>Title</th><th>Actions</th>
</tr>
<% @tasks.each do |task| -%>
<tr>
<td>
<%= link_to task.title, :action => 'show', :id => task.id %>
</td>
<td>
<%= link_to 'Edit', :action => 'edit', :id => task.id %> | 
<%= link_to 'Delete', :action => 'confirm', :id => task.id %>
</td>
</tr>
<% end -%>
</table>

<h1><%= @page_title %></h1>
<p>(<%= datetime_span(@task.start, @task.end) %>)</p>
<%= content_tag('p', @task.description) if @task.description %>
<p><%= show_complete(@task) %> | 
Owner: <%= @task.user.username %></p>
<p><%= link_to 'Edit', :action => 'update', :id => @task %> | 
<%= link_to 'Delete', :action => 'delete', :id => @task %> | 
<%= link_to 'Back to index', :action => 'index' %></p>


module ApplicationHelper 
# ... other helpers ... 
# Display a start/end datetime span in human readable form. If 
# both are given, ' to ' is placed in the middle of the string. 
# 
# +start_datetime+ is a Datetime instance, 
# +end_datetime+ is optional. 
def datetime_span(start_datetime, end_datetime=nil) 
str = start_datetime.strftime('%Y-%m-%d@%H:%M') 
if end_datetime 
str += ' to ' + end_datetime.strftime('%Y-%m-%d@%H:%M') 
end 
str 
end
end
module TasksHelper 
def show_complete(task) 
if task.complete? 
'Complete' 
else 
content_tag('span', 'Incomplete', :class => 'exception') 
end 
end
end


//new.rhtml template:
<% form_for :task, @task, :url => {:action => 'create'} do |f| %>
<%= render :partial => 'form', :locals => {:f => f} %>
<% end %>

//edit.rhtml:
<% form_for :task, @task, :url => {:action => 'update', :id => @task.id} do |f| %>
<%= render :partial => 'form', :locals => {:f => f} %>
<% end %>


class TasksController < ApplicationController 
before_filter :get_people, :only => [:edit, :update, :new, 
:create] 
before_filter :get_users, :only => [:edit, :update, :new, :create] 
# ... other methods ... 
private 
def get_people 
@people = Person.find_all_ordered 
end 
private 
def get_users 
@users = User.find(:all, :order => 'username') 
end
end


<h1><%= @page_title %></h1>
<p>Required fields are marked with &quot;*&quot;.</p>
<p><%= label :task, 'Title', :required => true %> 
<%= f.text_field :title %>
<%= error_message_on :task, :title %></p>
<p><%= label :task, 'Description' %><br/>
<%= f.text_area :description, :rows => 5, :cols => 30 %></p>
<p><%= label :task, 'Owned by user', :field_name => 'user' %> 
<select name="task[user_id]">
<%= options_from_collection_for_select @users, :id, :username, session[:user].id %>
</select>
<%= error_message_on :task, :user %></p>
<p><%= label :task, 'Associated with person', :field_name => 'person' %>
<%= f.collection_select :person_id, @people, :id, :full_name, 
:include_blank => true %>
<%= error_message_on :task, :person %></p>
<p><%= label :task, 'Complete' %> <%= f.check_box :complete %></p>
<% this_year = Time.now.year -%>
<p><%= label :task, 'Start', :required => true %> 
<%= f.datetime_select :start, :start_year => this_year - 5, 
:end_year => this_year + 5 %>
<%= error_message_on :task, :start %></p>
<p><%= label :task, 'End' %> 
<%= f.datetime_select :end, :start_year => this_year - 5, 
:end_year => this_year + 5, :include_blank => true, :default => nil %></p>
<p><%= submit_tag 'Save' %> | 
<%= link_to 'Cancel', :action => 'index' %></p>

