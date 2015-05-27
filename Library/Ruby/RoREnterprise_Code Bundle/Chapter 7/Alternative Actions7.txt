
#Renders a partial called some_stuff 
def show_alternative_stuff 
render :partial => "alternative_stuff" 
end 
def show_initial_stuff 
render :partial => "initial_stuff" 
end


<h2>This is the initial partial</h2>
<p>This is the original text to be displayed.</p>

<h2 style="color:green;">This is the replacement partial</h2>
<p style="color:red;">This is some alternative text to be displayed.</p> 