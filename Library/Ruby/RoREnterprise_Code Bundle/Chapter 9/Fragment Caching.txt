

...
<body>
<% cache(:controller => 'menu') do -%>
<div id="menu">
<p>Menu</p>
<ul>
<li><%= link_to 'Companies', :controller => 'companies' %>
<ul>
<li><%= link_to 'Add a company', :controller => 'companies',
:action => 'create' %></li>
</ul>
</li>
<li><%= link_to 'People', :controller => 'people' %>
<ul>
<li><%= link_to 'Add a person', :controller => 'people', 
:action => 'create' %></li>
</ul>
</li>
<li><%= link_to 'Addresses', :controller => 'addresses' %></li>
<li>
<% end -%>
...
</body>
</html>


<%
# start caching
user = session[:user]
username = (user.nil? ? nil : user.username)
cache(:controller => 'login_panel', :username => username) do
-%>
<% if session[:logged_in] -%>
Logged in as <strong><%= session[:user].username %></strong>; 
<%= link_to 'Logout', :controller => 'login', :action => 'logout' %>
<% else -%>
<%= link_to 'Login', :controller => 'login' %>
<% end -%>
</li>
</ul>
<% end # end caching -%>


