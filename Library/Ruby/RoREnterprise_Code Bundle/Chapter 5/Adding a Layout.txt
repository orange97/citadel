
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_GB" xml:lang="en_GB">
<head>
<title>Intranet</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<%= yield %>
</body>
</html>

<h1><%= @person.full_name %></h1>
<p><strong>Job title:</strong> <%= @person.job_title %></p>
<p><strong>Email address:</strong> <%= mail_to @person.email %></p>
<p><strong>Telephone:</strong> <%= @person.telephone %></p>
<p><strong>Mobile phone:</strong> <%= @person.mobile_phone %></p>
<p><strong>Date of birth:</strong> <%= @person.date_of_birth %></p>
<p><strong>Gender:</strong> <%= @person.gender %></p>
<p><strong>Keywords:</strong> <%= @person.keywords %></p>
<p><strong>Notes:</strong><br/><%= @person.notes %></p>

class PeopleController < ApplicationController 
layout 'pretty' 
...
End

Page Titles in Layouts
def index 
@paginator, @people = paginate :person, :per_page => 2, 
:select => 'id, last_name, first_name', 
:order => 'last_name, first_name' 
@page_title = "People (page #{@paginator.current.number})"
end
def show 
@person = Person.find params[:id] 
@page_title = "Profile for " + @person.full_name
End

<h1><%= @page_title %></h1>
<p><strong>Job title:</strong> <%= @person.job_title %></p>
...
