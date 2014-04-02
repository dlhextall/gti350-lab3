$(document).ready(initialiser);    



function initialiser()
{	

	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    $_GET[decode(arguments[1])] = decode(arguments[2]);
	});

	if($_GET['choix']== 'favoris'){
		 $( "#mes_favoris" ).css("background-color", "white");
	 	 $( "#mes_photos" ).css("background-color", "#354b5e");
	}
	else{
		 $( "#mes_photos" ).css("background-color", "white");
	 	 $( "#mes_favoris" ).css("background-color", "#354b5e");
	}

	

	/*$( "#mes_photos" ).click(function() {
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
		});*/


}