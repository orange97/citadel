
<%= javascript_tag "new Draggable('element_id')" -%>

<%= draggable_element :element_id -%>

//this will not work as desired:
<%= draggable_element :element_id -%>
<div id="element_id">stuff to be dragged</div>

//Whereas this will work:
<div id="element_id">stuff to be dragged</div>
<%= draggable_element :element_id -%>

<div id="<%= output_place -%>"></div> 
<%= draggable_element output_place -%>


<div class="draggable" id="<%= output_place -%>"></div> 
<%= draggable_element output_place, 
:revert => true -%>

.draggable { 
cursor : move;
}
.draggable:hover{ 
background : yellow;
}

