
# define a file to save email addresses into
email_addresses_file = 'emails.txt'
# get the email_address variable from the querystring
email_address = querystring['email_address']
# CONTROLLER: switch action of the script based on whether
# email address has been supplied
if '' == email_address 
# VIEW: generate HTML form to accept user input which 
# posts back to this script 
content = "<form method='post' action='" + self + "'>\ 
<p>Email address: <input type='text' name='email_address'/></p>\ 
<p><input type='submit' value='Save'/></p>\ 
</form>"
else 
# VIEW: generate HTML to confirm data submission 
content = "<p>Your email address is " + email_address + "</p>" 
# MODEL: persist data 
if not file_exists(email_addresses_file) 
create_file(email_addresses_file) 
end if 
write_to_file(email_addresses_file, email_address)
end if
print "<html><head><title>Email manager</title></head>\
<body>" + content + "</body></html>"



