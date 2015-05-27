
def index 
@paginator, @people = paginate :person, :per_page => 2, 
:order => 'last_name, first_name'
End

# show links to the 3 pages before and the 3 pages 
# after the current page (default is 2 either side);
# any pages not linked to are represented by '...'
pagination_links(@paginator, :window_size => 3)
# include a link to the current page (default is false)
pagination_links(@paginator, :link_to_current_page => true)
# add some extra querystring parameters to each link URL
pagination_links(@paginator, :params => { :day => 'today' })

<p>
<% page_num = @paginator.current.number -%>
<% last_page_num = @paginator.last.number -%>
<%= link_to('Previous', :page => page_num - 1) + "&nbsp;" unless 1 == page_num -%>
<%= pagination_links(@paginator) %>
<%= link_to('Next', :page => page_num + 1) unless last_page_num == page_num -%>
</p
