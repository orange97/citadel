
</VirtualHost>
<VirtualHost wiki.company.local:80> 
ServerName wiki.company.local 
ServerAlias wiki.company.local 
ProxyPass / http://wiki.company.local:2500/ 
ProxyPassReverse / http://wiki.company.local:2500 
ProxyPreserveHost on
</VirtualHost>

//app/helpers/application_helper.rb 
#Generates a link to the wiki page holding relevant help information. 
def help_link(wiki_entry_name=nil) 
wiki_url = "http://wiki.robhome.local/help/show" 
if wiki_entry_name 
wiki_url += "/#{wiki_entry_name}" 
link_text = "Help for #{wiki_entry_name.underscore.humanize}" 
else 
wiki_url += "/HomePage" 
link_text = "Help" 
end 
link_to link_text, wiki_url, {:target => '_blank'} 
end

<%= help_link 'CompanyList' %>