
class TasksController < ApplicationController 
# ... other methods ... 
def create 
@task = Task.new(params[:task]) 
if @task.save 
flash[:notice] = "Task added successfully"
redirect_to_person @task.person_id 
else 
@page_title = "Adding new task" 
render :action => 'new' 
end 
end 
def update 
if @task.update_attributes(params[:task]) 
flash[:notice] = "Task added successfully" 
redirect_to_person @task.person_id 
else 
@page_title = "Edit " + @task.title 
render :action => 'edit' 
end 
end 
private 
def redirect_to_person(person_id) 
if person_id 
redirect_to :controller => 'people', :action => 'show', 
:id => person_id 
else 
redirect_to :action => 'index' 
end 
end
end