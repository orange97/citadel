
class PeopleController < ApplicationController 
def index 
@people = Person.find_all_ordered 
end
end
<h1>People list</h1>
<table>
<tr>
<th>Name</th>
</tr>
<% @people.each do |person| -%>
<tr><td><%= person.last_name + ', ' + person.first_name %></td></tr>
<% end -%>
</table>
