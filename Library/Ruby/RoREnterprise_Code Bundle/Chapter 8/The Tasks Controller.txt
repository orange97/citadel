
$ ruby script/generate controller tasks

class TasksController < ApplicationController 
before_filter :authorize, :except => [:index, :show] 
before_filter :get_task, :only => [:show, :edit, :update, 
:confirm, :delete] 
def index 
@page_title = "All tasks" 
@tasks = Task.find(:all, :order => 'title') 
end 
def show 
@page_title = "Task: " + @task.title 
end 
def new 
@page_title = "Adding new task" 
@task = Task.new 
end 
def create 
@task = Task.new(params[:task]) 
if @task.save 
redirect_to_index "Task added successfully" 
else 
@page_title = "Adding new task" 
render :action => 'new' 
end 
end 
def edit 
@page_title = "Edit " + @task.title 
end 
def update 
if @task.update_attributes(params[:task]) 
redirect_to_index "Task updated successfully" 
else 
@page_title = "Edit " + @task.title 
render :action => 'edit' 
end 
end 
def confirm 
confirm_delete(@task, 
"Are you sure you want to delete " + @task.title + "?")
end 
def delete 
do_delete(@task) 
end 
private 
def get_task 
@task = Task.find(params[:id]) 
end
end


