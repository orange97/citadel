
def show 
get_person unless read_fragment({}) 
# NB NEXT LINE DOESN'T WORK PROPERLY ANY MORE - see text! 
@page_title = 'Person profile for ' + @person.full_name
end


before_filter :get_person, :only => [:update, :delete]


def show 
get_person unless read_fragment({}) 
@page_title = 'Person profile for ' + @person.full_name
end


def show 
get_person unless read_fragment({}) 
title_cache_key = fragment_cache_key({}) + '.title' 
@page_title = read_fragment(title_cache_key) 
unless @page_title 
@page_title = 'Person profile for ' + @person.full_name 
write_fragment(title_cache_key, @page_title) 
end
end


class ApplicationController < ActionController::Base 
# ... other methods ... 
# Store a fragment in the cache; "." + fragment_suffix is 
# appended to the standard cache key for this 
# controller/action; if a fragment with this key exists, 
# return it; if not, call the block &generator to create 
# the value, store it in the cache, and return it 
private 
def handle_text_fragment(fragment_suffix, &generator) 
text_fragment_name = fragment_cache_key({}) + "." + fragment_suffix 
value = read_fragment(text_fragment_name) 
unless value 
begin 
value = generator.call 
write_fragment(text_fragment_name, value) 
rescue 
value = '' 
end 
end 
return value 
end
end


def show 
get_person unless read_fragment({}) 
fragment = handle_text_fragment("title") { @person.full_name } 
@page_title = "Profile for " + fragment
end