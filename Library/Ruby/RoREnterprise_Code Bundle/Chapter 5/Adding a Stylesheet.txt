
* { 
font-family: verdana, arial, helvetica, sans-serif;
}
table, tr, td, th { 
border: solid #777 thin; 
padding: 5px;
border-collapse: collapse; 
text-align: left; 
vertical-align: top;
}

<head>
<title><%= @page_title || 'Intranet' %></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<%= stylesheet_link_tag 'base' %>
</head>

<link href="/stylesheets/base.css?1165272734" media="screen" rel="Stylesheet" type="text/css" />

# link to '/styles/core.css'
stylesheet_link_tag '/styles/core'
# link to '/stylesheets/mystyles/fancy.css'
# (relative paths are append to '/stylesheets')
stylesheet_link_tag 'mystyles/fancy'
