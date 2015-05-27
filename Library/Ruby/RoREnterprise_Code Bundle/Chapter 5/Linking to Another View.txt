
<% @people.each do |person| -%>
<tr><td>
<%= link_to person.full_name, :action => 'show', :id => person.id %>
</td></tr>
<% end -%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_GB" xml:lang="en_GB">
<head>
<title>Intranet</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<h1><%= @person.full_name %></h1>
<p><strong>Job title:</strong> <%= @person.job_title %></p>
<p><strong>Email address:</strong> <%= mail_to @person.email %></p>
<p><strong>Telephone:</strong> <%= @person.telephone %></p>
<p><strong>Mobile phone:</strong> <%= @person.mobile_phone %></p>
<p><strong>Date of birth:</strong> <%= @person.date_of_birth %></p>
<p><strong>Gender:</strong> <%= @person.gender %></p>
<p><strong>Keywords:</strong> <%= @person.keywords %></p>
<p><strong>Notes:</strong><br/><%= @person.notes %></p>
</body>
</html>
