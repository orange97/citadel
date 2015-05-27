
# Script for importing Outlook address data into Intranet.
#
# Where data is retrieved from columns in the import file, the mapping
# described in the section Mapping a Text File to Database Tables is used
# to work out, which column it goes into in the database
## Each time a save fails, show an error message and the line number
# in the file where the error occurred.
# 
# Run this script through script/runner
open contacts.tsv file (tab-separated contacts file exported from Outlook)
read in the first line (which contains the column headings)
split the first line around the tab character "\t" into array raw_field_names
create a hash which maps the field name onto its index position in the array; this makes it easier to reference fields within the subsequent lines by field name, rather than position
for each remaining line: 
split around tab character into an array of values 
# parse out company address 
get company street_1 and post_code 
if there is an existing address with the same street_1 and post_code: 
use that for the company address 
else: 
parse out the remaining address fields to create a new address 
save new address 
use it for the company address 
end 
# parse out personal address 
get personal street_1 and post_code 
if there is an existing address with the same street_1 and post_code: 
use that for the personal address 
else: 
parse out the remaining address fields to create a new address 
save new address 
use it as the personal address 
end 
# company 
get the company name field 
if there is an existing company with that name: 
use that company as the person's company 
else: 
parse out the remaining company fields to fill out the company details associate the company with the company address extracted earlier 
save new company 
end 
# person
parse out the person fields to create a new person (using the mapping) 
associate with personal address 
associate with company 
save new person
end # no more lines in file

$ rake db:migrate VERSION=0
$ rake db:migrate
$ ruby script/runner db/import/import_from_outlook.rb
...
