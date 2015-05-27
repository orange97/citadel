
<h1><%= @page_title %></h1>
<p>Required fields are marked with &quot;*&quot;.</p>
<% form_for :person, @person, :url => {:action => 'create'} do |f| %>
<p><%= label :person, 'Title' %> <%= f.text_field :title, :size => 8 %></p>
<p><%= label :person, 'First name', :required => true %><br />
<%= f.text_field :first_name %>
<%= error_message_on :person, :first_name %></p>
<p><%= label :person, 'Last name', :required => true %><br />
<%= f.text_field :last_name %>
<%= error_message_on :person, :last_name %></p>
<p><%= label :person, 'Job title' %> 
<%= f.text_field :job_title %></p>
<p><%= label :person, 'Telephone' %> <%= f.text_field :telephone, :size => 16 %> 
<%= label :person, 'Mobile', :field_name => 'mobile_phone' %> 
<%= f.text_field :mobile_phone, :size => 16 %></p>
<p><%= label :person, 'Email address', :field_name => 'email', :required => true %><br />
<%= f.text_field :email %>
<%= error_message_on :person, :email %></p>
<p><%= label :person, 'Gender', :required => true %> 
<%= f.select :gender, Person::GENDERS.keys %>
<%= error_message_on :person, :gender %></p>
<p><%= label :person, 'Date of birth' %> 
<span id="person_date_of_birth">
<% this_year = Time.now.year -%>
<%= f.date_select :date_of_birth, :order => [:year, :month, :day], :include_blank => true, :end_year => (this_year - 100), 
:start_year => this_year %>
</span></p>
<p><%= label :person, 'Keywords' %> <%= f.text_field :keywords %></p>
<p><%= label :person, 'Notes' %><br />
<%= f.text_area :notes %></p>
<p><%= submit_tag 'Save' %> | <%= link_to 'Cancel', :action => 'index' %></p>
<% end %>

...
<li><%= link_to 'People', :controller => 'people' %>
<ul>
<li><%= link_to 'Add a person', :controller => 'people', 
:action => 'new' %></li>
</ul>
</li>
...
