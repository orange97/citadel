
def create 
@person = Person.new(params[:person]) 
if request.post? and @person.save 
flash[:notice] = 'Person added successfully' 
redirect_to :action => 'index' 
else 
@page_title = "Add a new person" 
render :action => 'new' 
end
end

class ApplicationController < ActionController::Base 
session :session_key => '_Intranet_session_id' 
# Set +message+ under the :notice key in the flash, 
# then redirect to the index action. 
private 
def redirect_to_index(message=nil) 
flash[:notice] = message 
redirect_to :action => 'index' 
end
end

def create 
@person = Person.new(params[:person]) 
if request.post? and @person.save 
redirect_to_index 'Person added successfully' 
else 
@page_title = "Add a new person" 
render :action => 'new' 
end
end

def update 
if @person.update_attributes(params[:person]) 
redirect_to_index 'Person updated successfully' 
else 
@page_title = "Editing " + @person.full_name 
render :action => 'edit' 
end
end
