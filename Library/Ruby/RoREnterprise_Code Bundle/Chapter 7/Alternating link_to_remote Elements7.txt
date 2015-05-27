
<p> 
<span id="show_alternative_link"> 
<%= link_to_remote "Show Alternative Partial", 
:update => "output_place", 
:url => {:action => 'show_alternative_stuff'}, 
:success => "$('show_alternative_link').hide()", 
:complete => "$('show_initial_link').show()" %> 
</span> 
<span style="display: none;" id="show_initial_link"> 
<%= link_to_remote "Show Initial Partial", 
:update => "output_place", 
:url => { :action => 'show_initial_stuff' }, 
:success => "$('show_initial_link').hide()", 
:complete => "$('show_alternative_link').show()" %> 
</span>
</p> 
<div id="output_place"><%= render :partial => 'initial_stuff' -%></div> 