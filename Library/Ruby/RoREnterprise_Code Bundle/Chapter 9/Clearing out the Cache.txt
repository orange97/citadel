
$ rake tmp:cache:clear


class PeopleSweeper < ActionController::Caching::Sweeper 
observe Person 
def after_update(record) 
clear_people_fragments(record) 
end 
def after_destroy(record) 
clear_people_fragments(record) 
end 
def clear_people_fragments(record) 
key = fragment_cache_key(:controller => 'people', 
:action => 'show', :id => record.id) 
expire_fragment(key) 
expire_fragment(key + ".title") 
end
end


class PeopleController < ApplicationController 
helper TasksHelper 
before_filter :authorize, :except => [:index, :search, :show] 
before_filter :get_person, :only => [:show, :update, :delete] 
before_filter :all_addresses, :only => [:update, :create] 
cache_sweeper :people_sweeper, :only => [:update, :delete] 
# ... other methods ...
end