<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "testing");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		
		{
			echo '<script>alert("Dit product zit al in uw winkelmandje")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Product uit uw winkelmandje verwijderd")</script>';
				echo '<script>window.location="afrekenen.php"</script>';
			}
		}
	}
}

?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Afrekenen</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet font">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet bootstrap" href="css/bootstrap.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet slick" href="css/slick.css" />

	<!-- Font Awesome Iconen -->
	<link rel="stylesheet" href="css/font-awesome.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="./img/favicon.png"/>

</head>

<body>
<!-- header -->
	<header>
				<div id="header">
			<div class="container">
				<div class="pull-left">
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="./img/logo.png" alt="logo">
						</a>
					</div>
					<div class="header-logo2">
						<a class="logo" href="index.php">
							<img src="./img/logo2.png" alt="logo">
						</a>
					</div>
				</div>

				<div class="pull-right">
					<ul class="header-btns">
						
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">*Mijn account* <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="inloggen.php" class="text-uppercase">*Login*</a> 
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> Mijn account</a></li>
								<li><a href="afrekenen.php"><i class="fa fa-check"></i> *Afrekenen*</a></li>
								<li><a href="registreren.php"><i class="fa fa-user-plus"></i> *Een account aanmaken*</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Winkelwagen -->
						<li class="header-cart">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<strong class="text-uppercase"><a href="afrekenen.php">*Winkelmandje:*</a></strong>
								<br>
								
									<?php
					
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
												
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>

							<span> €

								<?php echo number_format($total, 2); ?>





								</span>
						</li>
						<!-- /Winkelmandje -->

						<!-- Mobiel nav-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobiel nav -->
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- /header -->

	<!-- categorieën -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- categorieën2 -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categorieën <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">*Armbanden* <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Heren</h3></li>
											<li><a href="#">Paracord armbanden</a></li>
											<li><a href="#">Leren armbanden</a></li>
											<li><a href="#">Zilveren armbanden</a></li>
										</ul>	
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Dames</h3></li>
											<li><a href="#">Zilveren bedelarmbanden</a></li>
											<li><a href="#">Aluminium bedelarmbanden</a></li>
											<li><a href="#">Messing bedelarmbanden</a></li>
											<li><a href="producten-suikerpot-armbanden.php">*Suikerpot-collectie*</a></li>
											<li><a href="#">Leren armbanden</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="SMmd-12">
										<hr>
										<a class="banner banner-1" href="producten-suikerpot-armbanden.php">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="black-color">NIEUWE COLLECTIE</h2>
												<h3 class="black-color">SHOP NU</h3>
											</div>
											<hr>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Enkelbandjes</a></li>
						<li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">*Kettingen* <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Zilveren kettingen</h3></li>
											<li><a href="#">Zilveren ketting met grote bedel</a></li>
											<li><a href="producten-kettingen.php">*Zilveren ketting met middelgrote bedel*</a></li>
											<li><a href="#">Zilveren ketting met kleine bedel</a></li>
											<li><a href="#">Zilveren ketting zonder bedel</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Koord kettingen</h3></li>
											<li><a href="#">Koord ketting met grote bedel</a></li>
											<li><a href="#">Koord ketting met middelgrote bedel</a></li>
											<li><a href="#">Koord ketting met kleine bedel</a></li>
											<li><a href="#">Koord ketting zonder bedel</a></li>
										</ul>
										<hr>
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Leren kettingen</h3></li>
											<li><a href="#">Leren ketting met grote bedel</a></li>
											<li><a href="#">Leren ketting met middelgrote bedel</a></li>
											<li><a href="#">Leren ketting met kleine bedel</a></li>
											<li><a href="#">Leren ketting zonder bedel</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Gouden kettingen</h3></li>
											<li><a href="#">Gouden ketting met grote bedel</a></li>
											<li><a href="#">Gouden ketting met middelgrote bedel</a></li>
											<li><a href="#">Gouden ketting zonder bedel</a></li>
										</ul>
										<hr>
									</div>
									<div class="col-md-4 hidden-sm hidden-xs">
										<a class="banner banner-2" href="#">
											<img src="./img/banner04.jpeg" alt="">
											<div class="banner-caption">
												<h3 class="black-color">NIEUWE<br>COLLECTIE</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="producten-ringen.php">*Ringen*</a></li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Custom made hangers <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Aluminium sleutelhangers</h3></li>
											<li><a href="#">Ronde sleutelhangers</a></li>
											<li><a href="#">Vierkante sleutelhangers</a></li>
											<li><a href="#">Rechthoekige sleutelhangers</a></li>
											<li><a href="#">Stervormige sleutelhangers</a></li>
											<li><a href="#">ID-tags</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Aluminium penningen</h3></li>
											<li><a href="#">Ronde penningen</a></li>
											<li><a href="#">Vierkante penningen</a></li>
											<li><a href="#">Rechthoekige penningen</a></li>
											<li><a href="#">Stervormige penningen</a></li>
											<li><a href="#">ID-tags</a></li>
										</ul>
										<hr>
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Koperen sleutelhangers</h3></li>
											<li><a href="#"></a></li>
											<li><a href="#">Ronde sleutelhangers</a></li>
											<li><a href="#">Vierkante sleutelhangers</a></li>
											<li><a href="#">Rechthoekige sleutelhangers</a></li>
											<li><a href="#">Stervormige sleutelhangers</a></li>
											<li><a href="#">ID-tags</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Koperen penningen</h3></li>
											<li><a href="#">Ronde penningen</a></li>
											<li><a href="#">Vierkante penningen</a></li>
											<li><a href="#">Rechthoekige penningen</a></li>
											<li><a href="#">Stervormige penningen</a></li>
											<li><a href="#">ID-tags</a></li>

										</ul>
										<hr>
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Messing sleutelhangers</h3></li>
											<li><a href="#"></a></li>
											<li><a href="#">Ronde sleutelhangers</a></li>
											<li><a href="#">Vierkante sleutelhangers</a></li>
											<li><a href="#">Rechthoekige sleutelhangers</a></li>
											<li><a href="#">Stervormige sleutelhangers</a></li>
											<li><a href="#">ID-tags</a></li>
										</ul>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Messing penningen</h3></li>
											<li><a href="#">Ronde penningen</a></li>
											<li><a href="#">Vierkante penningen</a></li>
											<li><a href="#">Rechthoekige penningen</a></li>
											<li><a href="#">Stervormige penningen</a></li>
											<li><a href="#">ID-tags</a></li>
										</ul>
										<hr>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Sets</a></li>
					</ul>
				</div>
				<!-- /categorieën2 -->

				<!-- Man/vrouw menu -->
				<div class="menu-nav">
					<span class="menu-header">Heren of Dames? <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">*Home*</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Heren <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Armbanden en ringen</h3></li>
											<li><a href="#"></a></li>
											<li><a href="#">Paracord armbanden</a></li>
											<li><a href="#">Leren armbanden</a></li>
											<li><a href="#">Zilveren armbanden</a></li>
											<li><a href="#">Aluminium ringen</a></li>
											<li><a href="#">Zilveren ringen</a></li>
										</ul>
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Custom made sleutelhangers</h3></li>
											<li><a href="#">Aluminium sleutelhangers</a></li>
											<li><a href="#">Messing sleutelhangers</a></li>
											<li><a href="#">Koperen sleutelhangers</a></li>
										</ul>	
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Custom made penningen</h3></li>
											<li><a href="#"></a></li>
											<li><a href="#">Aluminium penningen</a></li>
											<li><a href="#">Messing penningen</a></li>
											<li><a href="#">Koperen penningen</a></li>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner16.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="black-color">NIEUWE COLLECITE</h2>
												<h3 class="black-color">SHOP NU</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">*Dames* <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner06.jpeg" alt="">
												<div class="banner-caption text-center">
													<h3 class="black-color text-uppercase">Armbanden</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Armbanden</h3></li>
											<li><a href="#">Zilveren bedelarmbanden</a></li>
											<li><a href="#">Aluminium bedelarmbanden</a></li>
											<li><a href="#">Messing bedelarmbanden</a></li>
											<li><a href="producten-suikerpot-armbanden.php">*Suikerpot-collectie*</a></li>
											<li><a href="#">Leren armbanden</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner07.jpeg" alt="">
												<div class="banner-caption text-center">
													<h3 class="black-color text-uppercase">Ringen</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Ringen</h3></li>
											<li><a href="#">Gouden ring</a></li>
											<li><a href="producten-ringen.php">*Zilveren ring*</a></li>
											<li><a href="#">Aluminium ring</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner08.jpeg" alt="">
												<div class="banner-caption text-center">
													<h3 class="black-color text-uppercase">3 voor €35,- </h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Sets</h3></li>
											<li><a href="#">Gouden set</a></li>
											<li><a href="#">Zilveren set</a></li>
											<li><a href="#">Aluminium set</a></li>
											<li><a href="#">Aluminium + leer set</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner09.jpeg" alt="">
												<div class="banner-caption text-center">
													<h3 class="black-color text-uppercase">Custom made</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Custom made hangers</h3></li>
											<li><a href="#">Aluminium sleutelhangers</a></li>
											<li><a href="#">Messing sleutelhangers</a></li>
											<li><a href="#">Koperen sleutelhangers</a></li>
											<li><a href="#">Aluminium penningen</a></li>
											<li><a href="#">Messing penningen</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- Man/vrouw menu -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /categorieën -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">*Home*</a></li>
				<li class="active">Afrekenen</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-6">
						<div class="billing-details">
							<p>Heeft u al een account? <a href="inloggen.php">*Login*</a></p>
							<div class="section-title">
								<h3 class="title">Verzendinformatie</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="voornaam" placeholder="Voornaam" >
							</div>
							<div class="form-group">
								<input class="input" type="text" name="achternaam" placeholder="Achternaam">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="adres" placeholder="Straatnaam + huisnummer">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="stad" placeholder="Stad">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="postcode" placeholder="Postcode (1234AA)">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telefoonnummer">
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Verzendmethodes</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Standaard verzending (1 - 4 werkdagen)</label>
								<div class="caption">
									<p>Momenteel is alleen standaard verzending mogelijk. Uw bestelling wordt gereed gemaakt en verzonden zodra de betaling is ontvangen.<p>
								</div>
							</div>
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Betaalmethodes</h4>
							</div>
					
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Overschrijving</label>
									<p>Momenteel is het alleen mogelijk om te betalen via een overschrijving. Excuses voor het ongemak.<p>
								</div>
							</div>
						</div>
					</div>

							
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Uw winkelmandje</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th></th>
										<th class="text-center">Product</th>
										<th class="text-center">Prijs</th>
										<th class="text-center">Hoeveelheid</th>
										<th class="text-center">Totaal</th>
										<th class="text-right">Item verwijderen?</th>
									</tr>
								</thead>
									
								<tbody>
<?php
if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>

									<tr>
											<td class="thumb"></td>

										<td class="details">
											<strong ><?php echo $values["item_name"]; ?> <strong>
										</td>


										<td class="price text-center"><strong class= "sand-color">€ <?php echo $values["item_price"]; ?></strong></del>

										</td>


										<td class="qty text-center">
											<?php echo $values["item_quantity"]; ?>

										</td>


										<td class="total text-center"><strong class="primary-color">€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></strong></td>


										<td class="text-right">

											<a href="afrekenen.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="main-btn icon-btn">x



											
												

											</i></a>

										</td>
									

									</tr>

<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
								</tbody>
								<tfoot>
									
									<tr>
										<th class="empty" colspan="3"></th>
										<th><h4>Totaalbedrag<h4></th>
										<th colspan="2" class="total">
											€  <?php echo number_format($total, 2); ?>

										</th>


									</tr>

								</tfoot>

							</table>
							<div class="pull-right">
								<button class="blauwe-btn">Plaats bestelling</button>

							</div>
<?php
					}

				
			

					?>
						</div>

					

					</div>

				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<!-- footer -->
	<footer id="footer" class="section grijs-gebied">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer bedrijf -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="index.php">
		            <img src="./img/logo-footer.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->
						<p>Seasons & the Sea, handgemaakte sieraden</p>
						<!-- footer sociale media -->
						<ul class="footer-social">
							<li><a href="https://www.facebook.com/seasonsandthesea/" target="_blank">*<i class="fa fa-facebook">*</i></a></li>
							<li><a href="https://www.instagram.com/seasonsandthesea/" target="_blank">*<i class="fa fa-instagram">*</i></a></li>
						</ul>
						<!-- /footer sociale media -->
					</div>
				</div>
				<!-- /footer bedrijf-->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer klantenservice -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Klantenservice</h3>
						<ul class="list-links">
							<li><a href="#">Over ons</a></li>
							<li><a href="#">Retourneren</a></li>
							<li><a href="#">Hoe verzenden wij onze producten?</a></li>
							<li><a href="#">FAQ</a></li>

						</ul>
					</div>
				</div>
				<!-- /footer klantenservice -->




				<!-- footer nieuwsbrief -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Blijf op de hoogte</h3>
						<p>Wilt u graag op de hoogte blijven van alle aanbiedingen, trends en inspiraties? Meld uzelf dan aan voor de nieuwsbrief!</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Vul hier uw email adres in.">
							</div>
							<button class="blauwe-btn">Ja, ik wil graag de nieuwsbrief ontvangen.</button>
						</form>
					</div>
				</div>
				<!-- /footer nieuwsbrief -->
			</div>
			<!-- /row -->
			<hr>
		</div>
		<!-- /container -->
	</footer>
	<!-- /footer -->


	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/slick.js"></script>
	<script src="js/main.js"></script>

<div class="footer-copyright">
	<h5>© 2018-2020 Seasons & the Sea · Alle rechten voorbehouden.</h5>
</div>


</body>

</html>