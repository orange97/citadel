
protected 
# Adds apostrophe to text for SQL LIKE statement. 
# prep_for_like('search') > '%search%' 
# prep_for_like('search', 'start') > 'search%' 
# prep_for_like('search', 'match') > 'search' 
def prep_for_like(text, placement='contain') 
case placement 
when 'match' 
text 
when 'start' 
"#{text}%" 
when 'end' 
"%#{text}" 
else 
"%#{text}%" 
end 
end

:conditions => ["name LIKE ?", prep_for_like(name)]