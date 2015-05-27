
acme_hq: 
id: 1 
street_1: '14 Blockfield' 
street_2: 'Minsterton' 
city: 'Jupiterton' 
post_code: 'BX1 4FG'
acme: 
id: 1 
name: 'Acme' 
address_id: 1
class CompanyTest < Test::Unit::TestCase 
fixtures :companies, :addresses 
...
End
class CompanyTest < Test::Unit::TestCase 
fixtures :companies, :addresses 
def test_must_have_real_address 
# Should fail with invalid address 
@acme.address = nil 
assert !@acme.save 
# Should save when assigned a valid address 
@acme.address = @acme_hq 
assert @acme.save 
end
end

