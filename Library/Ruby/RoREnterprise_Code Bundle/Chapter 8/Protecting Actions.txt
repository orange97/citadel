
class ApplicationController < ActionController::Base 
# ... other methods ... 
protected 
def authorize 
unless (true == session[:logged_in]) 
session[:destination] = request.request_uri 
redirect_to :controller => 'login' 
return false 
end 
end
end


class PeopleController < ApplicationController 
before_filter :authorize, :except => [:index, :search, :show] 
# ... other before_filter settings ... 
# ... other methods ...
end


class CompaniesController < ApplicationController 
before_filter :authorize, :except => [:index] 
# ... other before_filter settings ... 
# ... other methods ...
end


class AddressesController < ApplicationController 
before_filter :authorize, :except => [:index, :show] 
scaffold :address
end