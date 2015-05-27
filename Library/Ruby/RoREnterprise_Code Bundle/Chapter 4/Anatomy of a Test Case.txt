require File.dirname(__FILE__) + '/../test_helper'
class PersonTest < Test::Unit::TestCase 
fixtures :people 
# Replace this with your real tests. 
def test_truth 
assert true 
end
end
ginger: 
id: 1 
title: 'Mrs.' 
first_name: 'Ginger' 
last_name: 'Bloggs' 
email: 'ginger@example.com' 
gender: 'F'
fred: 
id: 2 
first_name: 'Fred' 
last_name: 'Bloggs' 
email: 'fred@example.com' 
gender: 'M'
albert: 
id: 3 
first_name: 'Albert' 
last_name: 'Always' 
email: 'albert@example.com' 
gender: 'M'

A person should have a valid email address
def test_reject_invalid_email_addresses 
@fred.email = 'fred @ hello.com' 
assert !@fred.save 
@fred.email = 'fred bloggs@hello.com' 
assert !@fred.save
end


No two People can have the Same email address

def test_email_must_be_unique 
@fred.email = @albert.email 
assert !@fred.save
end

A person without a first name is invalid
def test_must_have_first_name 
@fred.first_name = '' 
assert !@fred.save
end

A person without a last name is invalid
def test_must_have_last_name 
@fred.last_name = '' 
assert !@fred.save
end

A person's gender must be set to 'M' or 'F'
def test_reject_invalid_genders 
@fred.gender = 'P' 
assert !@fred.save
end

The full_name method should produce a correctly-formatted string
We need to test cases where a person has a title, and cases where they don't:
def test_full_name_correctly_formatted 
assert_equal 'Mrs. Ginger Bloggs', @ginger.full_name 
assert_equal 'Fred Bloggs', @fred.full_name
end

The find_all_ordered method should correctly sort people
def test_find_all_ordered 
people_in_order = Person.find_all_ordered 
assert_equal 3, people_in_order.size 
assert people_in_order[0].last_name <= people_in_order[1].last_name 
assert people_in_order[1].last_name <= people_in_order[2].last_name 
# fred should come before ginger, 
# even though they both have the same surname 
assert_equal 'Fred', people_in_order[1].first_name 
assert_equal 'Ginger', people_in_order[2].first_name 
assert people_in_order[1].first_name <= people_in_order[2] .first_name
end
