
class CompaniesController < ApplicationController 
def index 
@paginator, @companies = paginate :company, :per_page => 10, 
:order => 'name' 
@page_title = "List of Companies" 
end
end

Create the Index View
<h1><%= @page_title %></h1>
<table>
<tr>
<th>Name</th>
<th>Phone</th>
<th>Fax</th>
<th>Website</th>
</tr>
<% for company in @companies -%>
<tr>
<td><%= company.name %></td>
<td><%= company.telephone %></td>
<td><%= company.fax %></td>
<td><%= link_to(company.website, company.website) %></td>
</tr>
<% end -%>
</table>
<p>
<% page_num = @paginator.current.number -%>
<% last_page_num = @paginator.last.number -%>
<%= link_to('Previous', :page => page_num - 1) + "&nbsp;" unless 1 == page_num -%>
<%= pagination_links(@paginator) %>
<%= link_to('Next', :page => page_num + 1) unless last_page_num == page_num -%>
</p>
