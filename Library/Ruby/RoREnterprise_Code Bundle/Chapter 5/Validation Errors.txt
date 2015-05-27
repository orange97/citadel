
<div class="fieldWithErrors"><input id="person_first_name" name="person[first_name]" size="30" type="text" value="" /></div>

.fieldWithErrors { 
border: 0.2em solid red; 
display: table;
}

<p><%= label :person, 'First name', :required => true %><br />
<%= f.text_field :first_name %>
<%= error_message_on :person, :first_name %></p>
<p><strong><label for="person_first_name">First name</label>*:</strong><br />
<div class="fieldWithErrors"><input id="person_first_name" name="person[first_name]" size="30" type="text" value="" /></div>
<div class="formError">Please enter a first name</div></p>
.formError { 
color: red; 
font-size: 0.9em;
}

