
<h1><%= @page_title %></h1>
<p><%= form_tag({:controller => 'companies', 
:action => 'search'}, 
{:method => :get}) %>
<label for="term">Find company with name:</label>
<%= text_field_tag "term" -%>
<%= submit_tag 'Go' %>
</form></p><br />



def search 
name = params[:term] 
@paginator, @companies = paginate :company, 
:per_page => 10, 
:order => 'name', 
:conditions => "name = '#{name}'" 
@page_title = "List of companies called #{name}" 
render :action => 'index' 
end