
<p><% page_num = paginator.current.number -%>
<% last_page_num = paginator.last.number -%>
<%= link_to('Previous', :page => page_num - 1) + "&nbsp;" unless 1 == page_num -%>
<%= pagination_links(paginator) %>
<%= link_to('Next', :page => page_num + 1) unless last_page_num == page_num -%></p>

<%= render :partial => 'shared/paginator', 
:locals => { :paginator => @paginator } %>

Adding a Menu

...
<body>
<div id="menu"> 
<p>Menu</p> 
<ul> 
<li><%= link_to 'Companies', :controller => 'companies' %></li> 
<li><%= link_to 'People', :controller => 'people' %></li> 
</ul>
</div>
<div id="content"> 
<%= yield %>
</div>
</body>
...
#menu { 
float: left; 
width: 15%; 
background-color: #FFF280; 
padding: 1% 1% 0 1%;
}
#menu > ul > li { 
list-style-type: none; 
margin-left: -2.5em;
}
#content { 
float: right; 
margin-left: 2%; 
margin-right: 2%; 
width: 79%;
}
