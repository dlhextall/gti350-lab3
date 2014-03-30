
$(document).ready(initialiser);    



function initialiser()
{
	$( "#scroll_down" ).click(function() {
 	 $( "#over" ).animate({ "top": "+=-1200px" }, "slow" );
	});


}