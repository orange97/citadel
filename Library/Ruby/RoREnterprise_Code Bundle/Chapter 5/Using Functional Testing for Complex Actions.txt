
# Test the create action with bad request parameters
def test_create_bad_person 
# Send a post request to the create action with no parameters 
post :create 
# The response should be rendered using the people/new template 
assert_template 'people/new' 
# The response should contain a div with class 'formError' 
assert_select 'div[class=formError]'
end

def test_create_person_nil_address 
# Clear out the people table 
Person.delete_all 
# Post new person details with blank address 
post :create, :person => { 
:first_name => 'Bob', 
:last_name => 'Parks',
:email => 'bob@acme.biz', 
:gender => 'M' 
} 
# Check there is one person in the database 
person = Person.find(:first) 
assert_equal 'bob@acme.biz', person.email 
# Check their address is nil 
assert_equal nil, person.address 
# Check we get redirected to the index after creation 
assert_redirected_to :action => :index
end

def test_create_bad_street_1 
# Post valid person details, but with empty value for street_1 
post :create, 
:person => { 
:first_name => 'Bob', 
:last_name => 'Parks', 
:email => 'bob@acme.biz', 
:gender => 'M' 
}, 
:address => { 
:post_code => 'B15 1AU' 
} 
# Check the new form is shown again 
assert_template 'people/new' 
# Check we get validation errors for street_1 input element 
assert_select 'div[class=fieldWithErrors]' do 
assert_select 'input[id=address_street_1]' 
end
end

def test_create_person_address 
# Clear out the people and addresses tables 
Person.delete_all 
Address.delete_all 
# Send post with valid person and address 
post :create, 
:person => { 
:first_name => 'Bob', 
:last_name => 'Parks', 
:email => 'bob@acme.biz', 
:gender => 'M' 
}, 
:address => { 
:street_1 => '11 Harley Street', 
:post_code => 'B15 1AU' 
} 
# Check person created 
person = Person.find(:first) 
assert_equal 'bob@acme.biz', person.email 
# Check address created 
address = Address.find(:first) 
assert_equal 'B15 1AU', address.post_code
# Check person's address is the created address 
assert_equal person.address_id, address.id 
# Check redirected to index 
assert_redirected_to :action => :index
end
