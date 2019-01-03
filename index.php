<?php

include 'blocks.php';

$connected = false;
//Connected
if(!empty($_SESSION["connected"])){
	$connected = true;
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		
			head("Accueil");

			p_header(); 

		?>

		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Accueil</a></li>
						<li><a href="store.php">Produits</a></li>
						<?php
						if($connected){
							?>

							<li><a href="account.php">Mon compte</a></li>

							<?php
						}else{
							?>

							<li><a href="connexion.php">Connexion</a></li>
							<li><a href="inscription.php">Inscription</a></li>

							<?php
						}

						?>
						
						<li><a href="contact.php">Contact</a></li>
						<li><a href="about.php">A propos</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="Ordinateur">
							</div>
							<div class="shop-body">
								<h3>Ordinateur</h3>
								<a href="store.php?category=ordinateur" class="cta-btn">Voir <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
			
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Casque</h3>
								<a href="store.php?category=casque" class="cta-btn">Voir <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Camera</h3>
								<a href="store.php?category=camera" class="cta-btn">Voir <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<!--Retourne aléatoirement des articles dans la bdd-->
							<h3 class="title">Quelques produits</h3>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">

										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
												<!--<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>-->
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">Nom du produit</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye" aria-hidden="true"></i>Voir</button>
											</div>
										</div>

										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
												<!--<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>-->
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">Nom du produit</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye" aria-hidden="true"></i>Voir</button>
											</div>
										</div>

										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
												<!--<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>-->
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">Nom du produit</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye" aria-hidden="true"></i>Voir</button>
											</div>
										</div>

										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
												<!--<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>-->
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">Nom du produit</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye" aria-hidden="true"></i>Voir</button>
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="section">
			<div class="container">
				<a class="primary-btn cta-btn" href="store.php">Découvrir plus</a>
			</div>
		</div>

		<div id="hot-deal" class="section">
			<div class="container">
				
			</div>
		</div>
	
		<?php include 'footer.php'; ?>

	</body>
</html>
