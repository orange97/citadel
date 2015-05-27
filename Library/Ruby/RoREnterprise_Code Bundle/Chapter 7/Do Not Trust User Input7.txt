
def search 
name = params[:term] 
@paginator, @companies = paginate :company, 
:per_page => 10, 
:order => 'name', 
:conditions => ["name = ?", name] 
@page_title = "List of companies called #{name}" 
render :action => 'index' 
end