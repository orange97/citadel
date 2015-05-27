
class PeopleController < ApplicationController 
caches_page :index, :show 
# ... other methods ...
end


ActionController::Routing::Routes.draw do |map| 
# ... other routes ... 
# Enable caching of paginating index pages for PeopleController 
map.connect 'people/index/:page', :controller => 'people', 
:action => 'index' 
# Install the default route as the lowest priority. 
map.connect ':controller/:action/:id'
end
