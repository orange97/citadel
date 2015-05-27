
private
def get_person 
@person = Person.find(params[:id])
rescue 
redirect_to_index 'Person could not be found'
end


protected
def rescue_action_in_public(exception) 
if exception.is_a?(ActiveRecord::RecordNotFound) 
@message = "Record not found" 
end
end

//app/controllers/application.rb:
protected
def local_request? 
false
end

config.action_controller.consider_all_requests_local = true

//app/views/shared/exception.rhtml:
<h1>An exception occurred</h1>
<p class="exception"><%= @message %></p>

//public/stylesheets/base.css 
.exception { 
color: red;
}

//rescue_action_in_public method:
protected
def rescue_action_in_public(exception) 
if exception.is_a?(ActiveRecord::RecordNotFound) 
@message = "Record not found" 
end 
render :template => 'shared/exception'
end
