
$(document).ready(initialiser);    



function initialiser()
{
	$( "#scroll_down" ).click(function() {
 	 $( "#over" ).animate({ "top": "+=-1200px" }, "slow" );
	});

	

	$html = '<section class="login"><div class="titulo">Connexion</div><form action="process_login.php" method="post" enctype="application/x-www-form-urlencoded"><input type="text" name="email" required title="Username required" placeholder="Username" data-icon="U"><input type="password" name="password" required title="Password required" placeholder="Password" data-icon="x"><div class="olvido"></div><input type="submit" value="Submit"  onclick="formhash(this.form, this.form.password);"class="enviar" /></form></section>' ;

	$( "#connexion" ).click(function() {	 
 	
 	 $("body").append('<div id="boutton">X</div>');
 	  $("body").append('<div id="zeOverlay">'+$html+'</div>');
 	
 	 
	});

	

	
	
}


