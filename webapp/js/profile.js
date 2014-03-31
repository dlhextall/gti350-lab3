$(document).ready(initialiser);    



function initialiser()
{	

	 $( ".second" ).css("display", "none");

	$( "#mes_photos" ).click(function() {
	 	 $( "#mes_photos" ).css("background-color", "white");
	 	 $( "#mes_favoris" ).css("background-color", "#354b5e");
	 	  $( ".first" ).css("display", "inline");
	 	  $( ".second" ).css("display", "none");
		});



	$( "#mes_favoris" ).click(function() {
	 	  $( "#mes_favoris" ).css("background-color", "white");
	 	 $( "#mes_photos" ).css("background-color", "#354b5e");

	 	 $( ".second" ).css("display", "inline");
	 	 $( ".first" ).css("display", "none");
		});


}