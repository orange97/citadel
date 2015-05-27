
Set-Cookie: _Intranet_session_id=69289c7593407d1a5cadefd3de09a8e7; path=/

class ApplicationController < ActionController::Base 
session :session_key => '_Intranet_session_id' 
# ... other methods ...
end

class ApplicationController < ActionController::Base 
before_filter :track_login_time 
# Set the :login_time in the session if not already set 
protected 
def track_login_time 
session[:login_time] ||= Time.now 
end
end

def set_preference 
cookies[:font_size] = {:value => 'small', 
:expires => 2.years.from_now}
end

