
$ script/destroy controller people
$ script/generate controller people 
exists app/controllers/ 
exists app/helpers/ 
exists app/views/people 
exists test/functional/ 
create app/controllers/people_controller.rb 
create test/functional/people_controller_test.rb 
create app/helpers/people_helper.rb
class PeopleController < ApplicationController 
def index 
render :text => 'Hello world' 
end
end
class PeopleController < ApplicationController 
...
End
class ApplicationController < ActionController::Base 
session :session_key => '_Intranet_session_id'
end
... 
def index 
render :text => 'Hello world ' 
end
...
