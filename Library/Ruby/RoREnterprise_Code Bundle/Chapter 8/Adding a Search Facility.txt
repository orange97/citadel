
def search 
@paginator, @people = paginate :person, :per_page => 10, 
:select => 'id, last_name, first_name', 
:order => 'last_name, first_name' 
@page_title = "Search results (page #{@paginator.current.number})" 
render :action => 'index'
end


def search 
# Get the search term from the querystring and put 
# percentage signs round it so it can be used with a LIKE query 
term = "%#{params[:term]}%" 
@paginator, @people = paginate :person, :per_page => 10, 
:select => 'id, last_name, first_name', 
:order => 'last_name, first_name', 
:conditions => ['last_name LIKE :term or first_name LIKE :term \ 
OR notes LIKE :term OR keywords LIKE :term', {:term => term}] 
@page_title = "Search results (page #{@paginator.current.number})" 
render :action => 'index'
end


<li><%= link_to 'Addresses', :controller => 'addresses' %></li>
</ul>
<p>Search people</p>
<% form_tag({:controller => 'people', :action => 'search'}, {:method => :get}) do -%>
<p><input type="text" name="term" size="8" value=""/><br/>
<%= submit_tag 'Go' %></p>
<% end -%>
</div>

