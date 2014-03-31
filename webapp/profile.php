<?php

require_once 'inc/DatabaseConnection.php';
require_once 'inc/secure_functions.php';
sec_session_start();
$dbh = DatabaseConnection::singleton();
if (login_check($dbh->get()) == false) {
  header("Location: index.php");
}
else{
	$stmt = $dbh->get()->prepare("SELECT * FROM App_User WHERE u_id = ? LIMIT 1"); 
    $stmt->bindParam(1, $_SESSION['user_id'], PDO::PARAM_INT); // Bind "$user_id" to parameter.
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_CLASS);

    $stmt = $dbh->get()->prepare("SELECT * FROM photo WHERE p_app_user_id = ?");
	$stmt->bindParam(1, $_SESSION['user_id'], PDO::PARAM_STR);
	$stmt->execute();
	$images = $stmt->fetchAll(PDO::FETCH_CLASS);
	$nbElement = count($images);

	$stmt = $dbh->get()->prepare("SELECT *FROM photo, favorite_photo WHERE fp_app_user_id = ? and p_id = fp_photo_id");
	$stmt->bindParam(1, $_SESSION['user_id'], PDO::PARAM_STR);
	$stmt->execute();
	$favoris = $stmt->fetchAll(PDO::FETCH_CLASS);
	$nbFavoris = count($favoris);



	
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>PHOTOZ</title>       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style_profile.css"/>
        <link rel="stylesheet" type="text/css" href="css/index.css"/>
        <link rel="stylesheet" type="text/css" href="recherche/styles.css"/>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<script src="js/modernizr.custom.70736.js"></script>
		<noscript><link rel="stylesheet" type="text/css" href="css/noJS.css"/></noscript>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top clearfix">
         
            </div><!--/ Codrops top bar -->
			
			<div class="main">
				<header class="clearfix">
					<?php  
						$html = '<div id="user_connected"><a href="profile.php"><h3>'.$_SESSION['username'].'</h3></a>  |  <a href="logout.php"><h3>Déconnexion</h3></a></div>';						  
						echo $html;
					?>
					<div id="logo">
						<a id="lien" href="index.php">
							<img src="images/logo/logo.jpg" alt="img03"/>
						</a>
					</div>					

					<div class="support-note">
						<span class="note-ie">Sorry, only modern browsers.</span>
					</div>
					
				</header>
				<div id="ze_cont">
					<div id="test">
						<?php echo ('<img id="profile_pic"class="img_profile"src="'.$user[0]->u_profile_picture.'">') ?>
						<?php echo ('<h3 class="img_profile">Nom : '.$user[0]->u_first_name.' '.$user[0]->u_last_name.'</h3>') ?>
						<?php echo ('<h3 class="img_profile">Nombre d\'images : '.$nbElement.'</h3>') ?>
						<?php echo ('<h3 class="img_profile">Nombre de favoris : '.$nbFavoris.'</h3>') ?>
						<div id="mes_photos">MES PHOTOS</div>
						<div id="mes_favoris">MES FAVORIS</div>
					</div>
					<div  class="gamma-container gamma-loading" id="gamma-container">				
						<ul class="gamma-gallery">

							<?php 								
																
									if($nbElement > 0){
										foreach ($images as $image) {
											$html = '<li class="fisrt">';
											$html.= '<div data-alt="img'.$image->p_url.'" data-description="<h3>'.$image->p_description.'</h3>" data-max-width="1800" data-max-height="1350">';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="1300"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="1000"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="700"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="300"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="200"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="140"></div>';
											$html.= '<div data-src="'.$image->p_url.'"></div>';
											$html.= '<noscript><img src="'.$image->p_url.'" alt="img03"/></noscript>';
											$html.= '</li>';

											echo $html;
										}	
									}
									/*if($nbFavoris > 0){
										foreach ($favoris as $image) {
											$html = '<li class="second">';
											$html.= '<div data-alt="img'.$image->p_url.'" data-description="<h3>'.$image->p_description.'</h3>" data-max-width="1800" data-max-height="1350">';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="1300"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="1000"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="700"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="300"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="200"></div>';
											$html.= '<div data-src="'.$image->p_url.'" data-min-width="140"></div>';
											$html.= '<div data-src="'.$image->p_url.'"></div>';
											$html.= '<noscript><img src="'.$image->p_url.'" alt="img03"/></noscript>';
											$html.= '</li>';

											echo $html;
										}	
									}*/

							?>
						</ul>

						<div class="gamma-overlay"></div>
					</div>

				</div><!--/Ze_cont-->

			</div><!--/main-->
		</div>
		<footer>
			Tous droits réserver PHOTOZ 2014 ©
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/jquery.masonry.min.js"></script>
		<script src="js/jquery.history.js"></script>
		<script src="js/js-url.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/gamma.js"></script>
		<script src="js/RechercheScript.js"></script>
		<script src="js/profile.js"></script>
		<script type="text/javascript">

			
			$(function() {

				var GammaSettings = {
						// order is important!
						viewport : [ {
							width : 1200,
							columns : 5
						}, {
							width : 900,
							columns : 4
						}, {
							width : 500,
							columns : 3
						}, { 
							width : 320,
							columns : 2
						}, { 
							width : 0,
							columns : 2
						} ]
				};

				Gamma.init( GammaSettings, fncallback );


				// Example how to add more items (just a dummy):

				var page = 0,
					items = ['<li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/large/3.jpg" data-min-width="1300"></div><div data-src="images/large/3.jpg" data-min-width="1000"></div><div data-src="images/large/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/large/3.jpg" data-min-width="200"></div><div data-src="images/large/3.jpg" data-min-width="140"></div><div data-src="images/large/3.jpg"></div><noscript><img src="images/large/3.jpg" alt="img03"/></noscript></div></li>']

				function fncallback() {

					$( '#loadmore' ).show().on( 'click', function() {

						++page;
						var newitems = items[page-1]
						if( page <= 1 ) {
							
							Gamma.add( $( newitems ) );

						}
						if( page === 1 ) {

							$( this ).remove();

						}

					} );

				}

			});

		</script>	
	</body>
</html>
