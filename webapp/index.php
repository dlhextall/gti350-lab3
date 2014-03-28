<?php

require_once 'inc/DatabaseConnection.php';
require_once 'inc/secure_functions.php';
sec_session_start();
$dbh = DatabaseConnection::singleton();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>PHOTOZ</title>       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
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

					<div id="logo">
						<img src="images/logo/logo.jpg" alt="img03"/>
					</div>					

					<div class="support-note">
						<span class="note-ie">Sorry, only modern browsers.</span>
					</div>
					
				</header>
				
				<div class="gamma-container gamma-loading" id="gamma-container">
					
					<div id="page">   
					    <form  method="post">
							<fieldset>					        
					           	<input id="s" type="text" />					            
					            <input type="submit" value="Submit" id="submitButton" />
					        </fieldset>
					    </form>
					</div>

					<ul class="gamma-gallery">

						<li>
							<div data-alt="img03" data-description="<h3>300</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/1.jpg" data-min-width="1300"></div>
								<div data-src="images/large/1.jpg" data-min-width="1000"></div>
								<div data-src="images/large/1.jpg" data-min-width="700"></div>
								<div data-src="images/large/1.jpg" data-min-width="300"></div>
								<div data-src="images/large/1.jpg" data-min-width="200"></div>
								<div data-src="images/large/1.jpg" data-min-width="140"></div>
								<div data-src="images/large/1.jpg"></div>
								
								<noscript>
									<img src="images/large/1.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/4.jpg" data-min-width="1300"></div>
								<div data-src="images/large/4.jpg" data-min-width="1000"></div>
								<div data-src="images/large/4.jpg" data-min-width="700"></div>
								<div data-src="images/large/4.jpg" data-min-width="300"></div>
								<div data-src="images/large/4.jpg" data-min-width="200"></div>
								<div data-src="images/large/4.jpg" data-min-width="140"></div>
								<div data-src="images/large/4.jpg"></div>
								
								<noscript>
									<img src="images/large/4.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/5.jpg" data-min-width="1300"></div>
								<div data-src="images/large/5.jpg" data-min-width="1000"></div>
								<div data-src="images/large/5.jpg" data-min-width="700"></div>
								<div data-src="images/large/5.jpg" data-min-width="300"></div>
								<div data-src="images/large/5.jpg" data-min-width="200"></div>
								<div data-src="images/large/5.jpg" data-min-width="140"></div>
								<div data-src="images/large/5.jpg"></div>
								
								<noscript>
									<img src="images/large/5.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/6.jpg" data-min-width="1300"></div>
								<div data-src="images/large/6.jpg" data-min-width="1000"></div>
								<div data-src="images/large/6.jpg" data-min-width="700"></div>
								<div data-src="images/large/6.jpg" data-min-width="300"></div>
								<div data-src="images/large/6.jpg" data-min-width="200"></div>
								<div data-src="images/large/6.jpg" data-min-width="140"></div>
								<div data-src="images/large/6.jpg"></div>
								
								<noscript>
									<img src="images/large/6.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/7.jpg" data-min-width="1300"></div>
								<div data-src="images/large/7.jpg" data-min-width="1000"></div>
								<div data-src="images/large/7.jpg" data-min-width="700"></div>
								<div data-src="images/large/7.jpg" data-min-width="300"></div>
								<div data-src="images/large/7.jpg" data-min-width="200"></div>
								<div data-src="images/large/7.jpg" data-min-width="140"></div>
								<div data-src="images/large/7.jpg"></div>
								
								<noscript>
									<img src="images/large/7.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/6.jpg" data-min-width="1300"></div>
								<div data-src="images/large/6.jpg" data-min-width="1000"></div>
								<div data-src="images/large/6.jpg" data-min-width="700"></div>
								<div data-src="images/large/6.jpg" data-min-width="300"></div>
								<div data-src="images/large/6.jpg" data-min-width="200"></div>
								<div data-src="images/large/6.jpg" data-min-width="140"></div>
								<div data-src="images/large/6.jpg"></div>
								
								<noscript>
									<img src="images/large/6.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="images/large/3.jpg" data-min-width="1300"></div>
								<div data-src="images/large/3.jpg" data-min-width="1000"></div>
								<div data-src="images/large/3.jpg" data-min-width="700"></div>
								<div data-src="images/large/3.jpg" data-min-width="300"></div>
								<div data-src="images/large/3.jpg" data-min-width="200"></div>
								<div data-src="images/large/3.jpg" data-min-width="140"></div>
								<div data-src="images/large/3.jpg"></div>
								
								<noscript>
									<img src="images/large/3.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
					</ul>

					<div class="gamma-overlay"></div>

					<div id="loadmore" class="loadmore">Plus de résultats</div>

				</div>

			</div><!--/main-->
		</div>
		<footer>
			Tous droits réserver PHOTOZ 2014
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/jquery.masonry.min.js"></script>
		<script src="js/jquery.history.js"></script>
		<script src="js/js-url.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/gamma.js"></script>
		<script src="js/RechercheScript.js"></script>
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
