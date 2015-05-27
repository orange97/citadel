
class LoginController < ApplicationController 
# ... other actions 
def logout 
reset_session 
flash[:notice] = "You have logged out" 
redirect_to :controller => 'people' 
end
end


<div id="menu">
...
</ul>
<p>
<% if session[:logged_in] -%>
Logged in as <strong><%= session[:user].username %></strong>; 
<%= link_to 'Logout', :controller => 'login', :action => 'logout' %>
<% else -%>
<%= link_to 'Login', :controller => 'login' %>
<% end -%>
</p>
</div>