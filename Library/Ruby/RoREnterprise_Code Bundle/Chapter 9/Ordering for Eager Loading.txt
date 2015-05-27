
has_many :tasks, :order => 'complete ASC, start DESC', 
:dependent => :nullify


class PeopleController < ApplicationController 
# ... other methods ... 
private 
def get_person 
@person = Person.find(params[:id], 
:include => [:company, :address, :tasks], 
:order => 'tasks.complete ASC, tasks.start DESC') 
end
end

