<?php
/*
Template name: Kalkylator
*/



get_header();


do_action( 'flatsome_before_page' ); ?>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="http://arid.nu/wp-content/themes/arid/js/jquery.steps.min.js"></script>
<link href="http://arid.nu/wp-content/themes/arid/js/jquery.steps.css" rel="stylesheet">

<div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col maincol">
			<div class="col-inner">
				
				<?php if(get_theme_mod('default_title', 0)){ ?>
				<header class="entry-header">
					<h1 class="entry-title mb uppercase"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<?php } ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php do_action( 'flatsome_before_page_content' ); ?>
					

					<style>

					.final-price {
						    padding: 20px;
					    font-weight: 700;
					    font-size: 18px;
					    background-color: #ffffff;
    color: #5a4f4f;
					    border: 1px solid;
					    display: inline-block;
					    font-family: sans-serif;
    					margin-top: 10px;
					}

					.three-boxes {
						display:none;
					}
					.maincol {
						background-color: #5b5b5b;
					    background-image: url(http://arid.nu/wp-content/uploads/2017/06/arid-dranera-utan-att-grava-idag.png);
					    background-repeat: no-repeat;
					    background-size: cover;
					    background-position: 100%;
					    padding: 40px;
					    margin-bottom: 50px;
					    margin-top: 30px;
					}
					.wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions a:active {
    					background: #ff6600;
    					font-size: 16px;
    					text-transform: uppercase;
    				}

    				.single-box {
					    margin: 10px;
					    background-color: #f1f1f1;
					    padding: 20px;
					}
					.single-box a {
					    font-size: 14px;
					    width: 100%;
					}
					#progressBar {
					     width: 100%;
					    height: 22px;
					    border: 2px solid #e6e6e6;
					    background-color: #eaeaea;
					    background: url(http://arid.nu/wp-content/themes/arid/img/concrete_seamless.png);
					    margin-bottom: 20px;
					    border-radius: 20px;
					}
					#progressBar div {
				        height: 100%;
					    color: #fff;
					    text-align: right;
					    line-height: 22px;
					    width: 0;
					    background-color: #ff6600;
					    border-radius: 20px;
					}
					.steps.clearfix {
					    display: none;
					}
					.wizard > .content {
						min-height:300px;
						margin-left: 0px;
    					margin-right: 0px;
    					border: 2px solid #f9f9f9;
    					background: url(http://arid.nu/wp-content/themes/arid/img/concrete_seamless.png);
					}

					.wizard > .content > .body {
						padding:5%;
					}
					::-webkit-input-placeholder {
					   font-style: italic;
					}
					:-moz-placeholder {
					   font-style: italic;  
					}
					::-moz-placeholder {
					   font-style: italic;  
					}
					:-ms-input-placeholder {  
					   font-style: italic; 
					}

					.your-details {
						border: 1px solid #777777;
    					padding: 20px;
    					background: #eee;
					    border: 2px solid #404040;
					    -webkit-border-radius: 5px;
					    -moz-border-radius: 5px;
					    border-radius: 5px;
					    margin-bottom:30px;
					    border: 2px solid #f9f9f9;
    					background: url(http://arid.nu/wp-content/themes/arid/img/concrete_seamless.png);
					}

					#content h1, #content h3 {
						color: #484848;
    					text-align: right;
					}
					</style>


					<?php // the_content(); ?>

					<?php

						if( isset($_GET['calculator']) && $_GET['calculator'] == 'success' ) {
						     echo '<style>#calcDiv { display:none; }</style>';
						     echo '<style>.three-boxes { display:block; }</style>';
						     $city = $_POST['calc-city'];
						     $year = $_POST['calc-year'];
						     $material = $_POST['calc-material'];
						     //$innerwall = $_POST['calc-innerwall'];
						     $outerwall = $_POST['calc-outerwall'];
						     $ytskick = $_POST['calc-ytskick'];
						     $name = $_POST['calc-name'];
						     $telephone = $_POST['calc-telephone'];
						     $emailaddress = $_POST['calc-email'];

						     $defaultPrice = 73400;

						     $radhuspaketet = 62200;

						     //$totalWalls = ($innerwall + $outerwall);
						     $totalWalls = $outerwall;


						     $campaignActive = 0;
						     //JANUARI-KAMPANJ
						     /*
						     if ($city == "Skåne" || $city == "Halland" || $city == "Göteborg" || $city == "Älvsborg" || $city == "Bohuslän") {

							     if ($totalWalls > 20) {
							     	$campaignActive = 1;
							     	$defaultPrice = 64900;
						     		$campaignSlogan = '<span style="margin-left:15px;color: #fe6501;">KAMPANJ JANUARI UT*</span>'; 
							     }
						     }
						     */

						     if ($totalWalls <= 40) {
						     	$totalPrice = $defaultPrice;
						     }

						     if ($totalWalls <= 20) {
						     	$totalPrice = $radhuspaketet;
						     }

						     else if ($totalWalls > 40) {
						     	$wallMeasurement = ($totalWalls - 40);
						     	$wallPrice = ($wallMeasurement * 488);
						     	$totalPrice = ($defaultPrice + $wallPrice);
						     }

						     $formattedPrice = number_format($totalPrice, 0, ',', ' ');



						     echo '<h1>Äntligen klar!</h1>';
						     echo '<div class="your-details">';

						     echo '<div class="video-box">';
						     echo '<h2>Ditt uppskattade pris på dränering via Arid visas efter videon</h2>';

						     echo do_shortcode('[video width="1920" height="1080" poster="http://arid.nu/wp-content/uploads/2017/09/poster_arid.png" mp4="http://arid.nu/wp-content/uploads/2017/07/arid-video-dranering.mp4"][/video]');

						     echo '</div>';
						     ?>	
						     <script type='text/javascript'>
							
							    jQuery(document).ready(function(){
								    jQuery('video').on('ended',function(){
								     	jQuery('.video-box').hide("slow");
								     	jQuery('.finalpricebox').show("slow");
								    });
								  });
							</script>

						     <?php

						     echo '<div class="finalpricebox" style="display:none;">';

						     	echo '<h1>Arid hjälper dig att få torrt till minsta kostnad!</h1>';

							     echo '<p class="final-price style="padding: 20px;font-weight:700;font-size:18px;color: #ff6600;border: 1px solid;display: inline-block;margin-top:10px;">Pris (inkl. moms): '.$formattedPrice.' kr ';

							     if ($campaignActive == 1) {
							     	$oldprice = ($totalPrice + 9000);
							     	$formattedOldPrice = number_format($oldprice, 0, ',', ' ');
							     	echo '<span style="color:#a70000;text-decoration: line-through;">'.$formattedOldPrice.' kr</span>';
							     	echo $campaignSlogan;
							     	echo '</p>';
							     	
							     	echo '<p style="font-size:12px;margin-bottom:0px;">*Kampanjen gäller Skåne, Halland, Göteborg, Älvsborg & Blekinge.</p>';
							     }

							     

							     

							     echo '<p style="font-size:12px;"">*Priset är en uppskattning efter rotavdrag.</p>';
							     echo '<h3 style="text-align: left;">Är du intresserad men behöver mer information?</h3>';
							     echo '<p>Vi på Arid hjälper dig att ta rätt beslut angående dränering. <br>Ring oss på <strong>010-33 00 630</strong> eller mejla oss på <strong>info@arid.se</strong> så vägleder vi dig och svarar på dina frågor!</p>';
							     echo '<hr>';
							     echo '<h4>Dina uppgifter</h4><p>Du har en bostad i '.$city.' som byggdes '.$year.'. Materialet på de fuktskadade väggarna är <span style="text-transform:lowercase;">'.$material.'</span>. Löpmetern för ytterväggarna är '.$outerwall.' meter.</p>';
						     echo '</div>';

						     echo '</div>';

						     echo '<button class="button" id="toggleTest">Gör om test</button>';
						     echo '<a href="http://arid.nu/kontakt/" class="button">Kontakta oss för mer info</a>';
						   

						   	//SEND E-MAIL!!!

						    if (isset($_POST['calc-telephone']) ){

								$to = "info@arid.se";
								//$to = "mikaeldrenner@gmail.com";
								$subject = "Någon har beräknat pris på Arid.nu";

								$message = "
								<html>
								<head>
								<title>Priskalkylator</title>
								</head>
								<body>
								<p>Någon har beräknat ett pris på en dränering på Arid.nu</p>
								<p>Det uppskattade priset blev: ".$formattedPrice." (ink. moms).</p>
								<p>Personens kontaktuppgifter är: ".$name." ".$telephone."  ".$emailaddress."</p>
								<table>
								<tr>
								<th>Stad/Kommun</th>
								<th>Årtal</th>
								<th>Material</th>
								<th>Ytskick</th>
								<th>Ytterväggar</th>
								</tr>
								<tr>
								<td>".$city."</td>
								<td>".$year."</td>
								<td>".$material."</td>
								<td>".$ytskick."</td>

								<td>".$outerwall." m</td>
								</tr>
								</table>
								</body>
								</html>
								";

								// Always set content-type when sending HTML email
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

								// More headers
								$headers .= 'From: Arid.se <no-reply@arid.nu>' . "\r\n";

								mail($to,$subject,$message,$headers);

							}

						}
					?>

					<div id="calcDiv">
						
						<h1 style="margin-bottom: 0px;">Räkna ut priset på din dränering med Arid</h1>
						<h3 style="margin-bottom: 50px;">Gör vårt test så har du svaret inom en minut!</h3>

						<div id="progressBar"><div></div></div>

						<script>
						function progress(percent, $element) {
						    var progressBarWidth = percent * $element.width() / 100;
						    $element.find('div').animate({ width: progressBarWidth }, 500).html();
						}

			
						</script>
						
						<form id="the-calculator" name="form-calc" method="post" action="http://arid.nu/rakna-ut-pris/?calculator=success">

						    <h3>1</h3>
						    <fieldset>
						        <h2>Var finns fastigheten/huset?</h2>
						        <p>
						        	<!-- <input type="text" name="calc-city" placeholder="Exempelvis: Huddinge Kommun" required> -->
						        	<select name="calc-city" required> 
						        		<option value="">Välj ort</option>
						        		<option value="Norrbotten">Norrbotten</option>
						        		<option value="Västerbotten">Västerbotten</option>
						        		<option value="Jämtland">Jämtland</option>
						        		<option value="Västernorrland">Västernorrland</option>
						        		<option value="Gävleborg">Gävleborg</option>
						        		<option value="Dalarna">Dalarna</option>
						        		<option value="Värmland">Värmland</option>
						        		<option value="Örebro">Örebro</option>
						        		<option value="Västmanland">Västmanland</option>
						        		<option value="Uppsala">Uppsala</option>
						        		<option value="Stockholm">Stockholm</option>
						        		<option value="Södermanland">Södermanland</option>
						        		<option value="Skaraborg">Skaraborg</option>
						        		<option value="Östergötland">Östergötland</option>
						        		<option value="Göteborg">Göteborg</option>
						        		<option value="Bohuslän">Bohuslän</option>
						        		<option value="Älvsborg">Älvsborg</option>
						        		<option value="Jönköping">Jönköping</option>
						        		<option value="Kalmar">Kalmar</option>
						        		<option value="Gotland">Gotland</option>
						        		<option value="Halland">Halland</option>
						        		<option value="Kronoberg">Kronoberg</option>
						        		<option value="Blekinge">Blekinge</option>
						        		<option value="Skåne">Skåne</option>
						        	</select>

						        </p>
						    </fieldset>

						    <h3>2</h3>
						    <fieldset>
						        <h2>När byggdes huset?</h2>

						        <p>
						        	<input type="number" name="calc-year" placeholder="Exempelvis: 1978" required>
						        </p>
						    </fieldset>

						    <h3>3</h3>
						    <fieldset>
						        <h2>Vad är det för material i väggarna?</h2>
						        <p>
						        	<select name="calc-material">
									  <option value="Betong">Betong</option>
									  <option value="Betonghålsten">Betonghålsten</option>
									  <option value="Lecablock">Lecablock</option>
									  <option value="Lättbetong">Lättbetong</option>
									  <option value="Tegel">Tegel</option>
									</select>
						        </p>
						    </fieldset>

						    <h3>4</h3>
						    <fieldset>
							    <h2>Vilket ytskick har väggarna?</h2>
						        <p>
						        	<select name="calc-ytskick">
									  <option value="Inklädda väggar">Inklädda väggar</option>
									  <option value="Putsade väggar">Putsade väggar</option>
									</select>
						        </p>
						        
						    </fieldset>

						    <h3>5</h3>
						    <fieldset>
							    <h2>Hur många löpmeter yttervägg har ditt hus?</h2>
						        <p>
						        	<input type="number" name="calc-outerwall" min="1" step="1" placeholder="Exempelvis: 50" required/>
						        </p>
						        
						    </fieldset>
							<!--
						    <h3>6</h3>
						    
						    <fieldset>
						        <h2>Hur många löpmeter innerväggar har du fukt i?</h2>
						        <p>
						        	<input type="number" name="calc-innerwall" min="1" step="1" placeholder="Exempelvis: 17" required/>
						        </p>
						    </fieldset>
							-->

						    <h3>6</h3>
						    <fieldset>
						    <h2>Du är ett bara klick från ett pris</h2>
						    <p>
							    På nästa sida får du ett uppskattat pris för din dränering.<br>
								För att ge dig en fullständig prisbild som möter dina exakta behov behöver vi kontakta dig.<br><br>

								<input type="text" name="calc-name" placeholder="Ditt namn" style="width:45%;float:left;">
								<input type="text" name="calc-telephone" placeholder="Telefonnummer*" style="margin-left:10px;width:45%;float:left;" required>
								<input type="text" name="calc-email" placeholder="E-postadress*" style="width:45%;float:left;" required>
							</p>

						    </fieldset>
						</form>

						<script>

						function validateForm() {
						    var a=document.forms["form-calc"]["calc-city"].value;
						    var b=document.forms["form-calc"]["calc-year"].value;
						    var c=document.forms["form-calc"]["calc-material"].value;
						    //var d=document.forms["form-calc"]["calc-innerwall"].value;
						    var e=document.forms["form-calc"]["calc-outerwall"].value;
						    var f=document.forms["form-calc"]["calc-telephone"].value;
						    var g=document.forms["form-calc"]["calc-email"].value;

						    if (a==null || a=="" || b==null || b=="" || c==null || c=="" || e==null || e=="" || f==null || f=="" || g==null || g=="") {
						      alert("Var god fyll i samtliga fält!");
						      return false;
						    }

						    else {
						    	return true;
						    }
					    }


						jQuery("#the-calculator").steps({
						    headerTag: "h3",
						    bodyTag: "fieldset",
						    transitionEffect: "slideLeft",

						    /* Behaviour */
						    autoFocus: true,
						    enableAllSteps: false,
						    enableKeyNavigation: true,
						    enablePagination: true,
						    suppressPaginationOnFocus: true,
						    enableContentCache: true,
						    enableCancelButton: false,
						    enableFinishButton: true,
						    preloadContent: false,
						    showFinishButtonAlways: false,
						    forceMoveForward: false,
						    saveState: false,
						    startIndex: 0,

						    /* Events */
						    onStepChanged: function (event, currentIndex, priorIndex) { 
						    	if (currentIndex == 0) {
						    		progress(00, $('#progressBar'));
						    	}
						    	else if (currentIndex == 1) {
						    		progress(20, $('#progressBar'));
						    	}
						    	else if (currentIndex == 2) {
						    		progress(35, $('#progressBar'));
						    	}
						    	else if (currentIndex == 3) {
						    		progress(55, $('#progressBar'));
						    	}
						    	else if (currentIndex == 4) {
						    		progress(75, $('#progressBar'));
						    	}
						    	else if (currentIndex == 5) {
						    		progress(90, $('#progressBar'));
						    	}
						    	/*
						    	else if (currentIndex == 6) {
						    		progress(100, $('#progressBar'));
						    	}
						    	*/

						    }, 

						    onFinishing: function (event, currentIndex) {
						        //Validation?
						        //validateForm();
						        if (validateForm() == true) {
						        	return true;
						        }
						        
						        
						    },
						    onFinished: function (event, currentIndex) {
						    	var form = $(this);
							    // Submit form input
							    form.submit();
						    },

						    /* Labels */
						    labels: {
						        cancel: "Avbryt",
						        current: "nuvarande steg:",
						        pagination: "Pagination",
						        finish: "Räkna ut pris",
						        next: "Nästa",
						        previous: "Tillbaka",
						        loading: "Laddar ..."
						    }
						});

						$( "#toggleTest" ).click(function() {
						  /*$( "#calcDiv" ).toggle( "slow", function() {
						    // Animation complete.
						  });*/

						  window.location.replace("http://arid.nu/rakna-ut-pris");
						});
						</script>

					</div> <!-- end calcdiv -->







					<?php do_action( 'flatsome_after_page_content' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div><!-- .col-inner -->

		</div><!-- .large-12 -->

		<div class="large-4 small-12 three-boxes">
			<div class="single-box">
				<h2>Näst efter torra källare är nöjda kunder det bästa vi vet.</h2>
				<p>
					På bara några år har elektrisk endoosmos löst fuktproblemen för över 500 kunder, från enskilda villaägare till bostadsrättsföreningar och förvaltare av större fastighetsbestånd. Här kan du läsa om några av dessa referenser, om deras olika problem som alla hade en och samma lösning – elektrisk endoosmos från Arid.
				</p>	
				<a href="http://arid.nu/referenser/" class="button">Läs mer om hur det fungerar</a>
				
			</div>
		</div>

		<div class="large-4 small-12 three-boxes">
			<div class="single-box">
				<h2>Dränering med garanterat resultat. Torrt inom 90 dagar, annars pengarna tillbaka.</h2>
				<p>
				Att det är en effektiv metod är omvittnat i tester och forskningsrapporter samt, inte minst, i alla de över 500 installationer som är gjorda bara i Sverige. Varje installation sker på ett fackmannamässigt sätt med garanterat resultat inom 90 dagar och 10 års funktionsgaranti.
				</p>
				<a href="http://arid.nu/trygghet/" class="button">Läs mer om våra garantier</a>
			</div>
		</div>

		<div class="large-4 small-12 three-boxes">
			<div class="single-box">
				<h2>Vi har svar på dina frågor och tankar</h2>
				<p>
					Hur stora är driftkostnaderna? Slipper jag tilläggsisolera om jag installerar Arids system? Vart tar allt vatten vägen? Vad händer om strömmen bryts? Vi har försökt att samla de vanligaste frågorna och svaren på dessa på vår webbplats. Självklart går det även bra att ringa oss!
				</p>
				<a href="http://arid.nu/fragor-svar/" class="button">Vanliga frågor och svar</a>
			</div>
		</div>

	</div><!-- .row -->
</div>

<?php
do_action( 'flatsome_after_page' );
get_footer();



?>