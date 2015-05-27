
class PeopleController < ApplicationController 
helper TasksHelper 
before_filter :authorize, :except => [:index, :search, :show] 
before_filter :get_person, :only => [:update, :delete] 
before_filter :all_addresses, :only => [:update, :create] 
caches_action :index, :show 
# ... other methods ...
end



