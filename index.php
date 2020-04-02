<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "testing");

?>


<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Seasons & the Sea</title>

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
				<div class="category-nav">
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
											<br>
											<br>
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

	<!-- homepage -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!--  wrap slick -->
			<div class="home-wrap">
				<!--  slick -->
				<div id="home-slick">
					<!-- banner slick 1 -->
					<div class="banner banner-1">
						<img src="./img/banner01.jpg" alt="">
						<div class="banner-caption text-center">
							<h1>DE MOOISTE ARMBANDEN</h1>
							<h3 class="primary-color">NIEUWE COLLECTIE</h3>
							<a href ="producten-suikerpot-armbanden.php"><button class="blauwe-btn">*Shop nu*</button></a>
						</div>
					</div>
					<!-- /banner slick 1 -->

					<!-- banner slick 2 -->
					<div class="banner banner-1">
						<img src="./img/banner02.jpeg" alt="">
						<div class="banner-caption">
							<h1 class="black-color">DE BESTE DEALS<br><hr><span class="black-color">TOT WEL 60% KORTING</span></h1>
							<button class="blauwe-btn">Shop nu</button>
						</div>
					</div>
					<!-- /banner slick 2 -->

					<!-- banner slick 3 -->
					<div class="banner banner-1">
						<img src="./img/banner03.jpg" alt="">
						<div class="banner-caption">
							<h1 class="black-color">NIEUWE COLLECTIE</h1>
							<button class="blauwe-btn">Shop nu</button>
						</div>
					</div>
					<!-- /banner slick 3 -->
				</div>
				<!-- /slick -->
			</div>
			<!-- /wrap slick -->
		</div>
		<!-- /container -->
	</div>
	<!-- /homepage -->

	<!-- afbeeldingen -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -> col-md-4 -->
			<div class="row">
				<!-- afbeelding1 -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<a class="banner banner-1" href="blank.php">
						<img src="./img/banner10.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="black-color">NIEUWE COLLECTIE</h2>
						</div>
					</a>
				</div>
				<!-- /afbeelding1 -->

				<!-- afbeelding2 -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<a class="banner banner-1" href="producten-suikerpot-armbanden.php">
						<img src="./img/banner11.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="black-color">*NIEUWE COLLECTIE*</h2>
						</div>
					</a>
				</div>
				<!-- /afbeelding2 -->

				<!-- afbeelding3 -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<a class="banner banner-1" href="producten-ringen.php">
						<img src="./img/banner12.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="black-color">*NIEUWE COLLECTIE*</h2>
						</div>
					</a>
				</div>
				<!-- /afbeelding3 -->

			</div>
			<!-- /row -> col-md-4 -->
		</div>
		<!-- /container -->
	</div>
	<!-- /afbeeldingen -->

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