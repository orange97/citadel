
SELECT * FROM people
LEFT OUTER JOIN companies ON people.company_id = companies.id
LEFT OUTER JOIN addresses ON people.address_id = addresses.id
LEFT OUTER JOIN tasks ON people.id = tasks.person_id


class PeopleController < ApplicationController 
# ... other methods ... 
private 
def get_person 
@person = Person.find(params[:id], 
:include => [:company, :address, :tasks]) 
end
end


Person Load Including Associations (0.035309) SELECT people.'id' AS t0_r0, people.'title' AS t0_r1, people.'first_name' AS t0_r2,
...
addresses.'id' AS t2_r0, addresses.'street_1' AS t2_r1, 
...
tasks.'id' AS t3_r0, tasks.'title' AS t3_r1, tasks.'description' AS t3_r2,
...
FROM people LEFT OUTER JOIN companies ON companies.id = people.company_id LEFT OUTER JOIN addresses ON addresses.id = people.address_id LEFT OUTER JOIN tasks ON tasks.person_id = people.id WHERE (people.'id' = 1) 