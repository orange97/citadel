
<div id="fruit_list"> 
<ul> 
<li>Apples</li> 
<li>Pears</li> 
<li>Oranges</li> 
</ul>
</div>


<script language="JavaScript" type="text/javascript"> 
var fruit_list_div = document.getElementById("fruit_list"); 
var the_ul = fruit_list_div.getElementsByTagName("ul")[0]; 
var li_elements = the_ul.getElementsByTagName("li"); 
var second_li_text = li_elements[1].innerHTML; 
alert(second_li_text);
</script>


<script language="JavaScript" type="text/javascript"> 
var fruit_list_div = $("fruit_list"); 
var the_ul = fruit_list_div.down("ul"); 
var li_elements = the_ul.immediateDescendants(); 
var second_li_text = li_elements[1].innerHTML; 
alert(second_li_text);
</script>


<div id="output_place"></div> 


:update => "output_place"
