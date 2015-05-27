
protected
def rescue_action_in_public(exception) 
if exception.is_a?(ActiveRecord::RecordNotFound)
@message = "No record with that ID could not be found" 
elseif exception.is_a?(::ActionController::UnknownAction) or 
exception.is_a?(::ActionController::RoutingError) 
@message = "Page not found" 
end 
render :template => 'shared/exception'
end

