
def search 
name = params[:company][:name] 
if name and name.length > 0 
@paginator, @companies = paginate :company, 
:per_page => 10, 
:order => 'name', 
:conditions => ["UCASE(name) like UCASE(?)", prep_for_like(name)] 
@page_title = "List of companies with names that contain '#{name}'" 
render :action => 'index' 
else 
redirect_to :action => 'index' 
end 
end

auto_complete_for :company, :name 

<%= text_field_with_auto_complete :company, :name %>