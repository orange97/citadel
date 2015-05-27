
class ApplicationController < ActionController::Base 
# ... other methods ... 
private 
def do_delete(object, redirect_options=nil) 
if 'yes' == params[:confirm] 
object.destroy 
object_name = object.class.name.humanize 
flash[:notice] = object_name + ' deleted successfully' 
redirect_options ||= {:action => 'index'} 
redirect_to redirect_options 
end 
end
end


class TasksController < ApplicationController 
# ... other methods ... 
def delete 
redirect_options = { :controller => 'people', 
:action => 'show', :id => @task.person_id } 
do_delete(@task, redirect_options) 
end
end


Handling the Cancel Link

<p><%= submit_tag 'Save' %> | 
<%
if @task.person_id 
cancel_url_options = {:controller => 'people', :action => 'show', 
:id => @task.person_id}
else 
cancel_url_options = {:action => 'index'}
end
-%>
<%= link_to 'Cancel', cancel_url_options %></p>



Setting a Default Person for a New Task

class TasksController < ApplicationController 
# ... other methods ... 
def new 
@page_title = "Adding new task" 
@task = Task.new 
if params[:default_person_id] 
@task.person = Person.find(params[:default_person_id]) 
end 
end
end


