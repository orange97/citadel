
$ script/console
Loading development environment.
>> require 'profile'
>> Profiler__.start_profile
>> Person.find 1
>> Profiler__.stop_profile
>> Profiler__.print_profile(STDOUT) 
% cumulative self self total 
time seconds seconds calls ms/call ms/call name 
10.66 0.13 0.13 1 130.00 160.00 Mysql::Result#each 
10.66 0.26 0.13 52 2.50 6.54 RubyLex#getc 
9.02 0.37 0.11 27 4.07 6.30 Module#module_eval 
5.74 0.44 0.07 1846 0.04 0.04 String#== 
3.28 0.48 0.04 34 1.18 3.24 Array#include? 
...


class ApplicationController < ActionController::Base 
# ... other methods ... 
if DEFINE_PROFILER 
# A class which can be used as an around_filter for a controller, 
# to profile actions on that controller; profiles get 
# written into the profile directory with the 
# filename '<controller>_<action>.txt' 
class ProfileFilter 
require 'profile' 
# Extend the ProfileFilter class with methods from the 
# Profiler__ class 
extend Profiler__ 
# The filter class method must be implemented to 
# employ this class as a filter 
private 
def self.filter(controller, &action) 
start_profile 
action.call 
stop_profile 
profile_file_name = controller.controller_name.to_s + '_' \ 
+ controller.action_name.to_s + '.txt' 
out = File.open(
File.join(RAILS_ROOT, 'profile', profile_file_name), 'w' 
) 
print_profile(out) 
end 
end 
end
end



class PeopleController < ApplicationController 
around_filter ProfileFilter, :only => [:show] 
# ... other methods ...
end

