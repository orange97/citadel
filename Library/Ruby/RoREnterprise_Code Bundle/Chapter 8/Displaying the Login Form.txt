
$ ruby script/generate controller login index logout

<h2>Please login to continue</h2>
<% form_tag :action => 'check_credentials' do -%>
<p><%= label :login, 'Username' %></p>
<p><%= text_field 'login', 'username' %></p>
<p><%= label :login, 'Password' %></p>
<p><%= password_field 'login', 'passwd' %></p>
<p><%= submit_tag "Submit" %></p>
<% end -%>

