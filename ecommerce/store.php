<?php

include 'blocks.php';

$connected = false;
//Connected
if(!empty($_SESSION["connected"])){
	$connected = true;
}

$category = "all";
$founded_products = 0;

$all = true;
$ordinateur = false;
$camera = false;
$casque = false;

if(isset($_GET["category"])){
	$category = $_GET["category"];
	if(strpos($category, "ordinateur") !== false){
		$ordinateur = true;
	}else if(strpos($category, "camera") !== false){
		$camera = true;
	}else if(strpos($category, "casque") !== false){
		$casque = true;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		
			head("Produits");

			p_header(); 

		?>

		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Accueil</a></li>
						<li class="active"><a href="store.php">Produits</a></li>
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

		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Accueil</a></li>
							<li><a href="store.php">Toute catégories</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<div id="aside" class="col-md-3">
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<?php 
									if($ordinateur){
										echo '<input type="checkbox" id="category-1" checked="true">';
									}else{
										echo '<input type="checkbox" id="category-1" >';
									}
									?>
									<label for="category-1">
										<span></span>
										Ordinateur
									</label>
								</div>

								<div class="input-checkbox">
									<?php 
									if($camera){
										echo '<input type="checkbox" id="category-2" checked="true">';
									}else{
										echo '<input type="checkbox" id="category-2" >';
									}
									?>
									<label for="category-2">
										<span></span>
										Camera
									</label>
								</div>

								<div class="input-checkbox">
									<?php 
									if($casque){
										echo '<input type="checkbox" id="category-3" checked="true">';
									}else{
										echo '<input type="checkbox" id="category-3" >';
									}
									?>
									<label for="category-3">
										<span></span>
										Casque
									</label>
								</div>
							</div>
						</div>
					</div>

					<div id="store" class="col-md-9">

						<div class="row">

								<?php
								$connection = new mysqli("localhost", "root", "", "kwish");
								if ($connection->connect_error){header('Location: index.php');}

								if($all){
									$result = mysqli_query($connection, "SELECT * FROM produits");
								}else{
									$result = mysqli_query($connection, "SELECT * FROM produits WHERE category='$category'");
								}
								while ($row = mysqli_fetch_assoc($result)) {
									    echo '<div class="col-md-4 col-xs-6">
											    <div class="product">
											<div class="product-img">
												<img src="'.$row["image"].'" alt="">
												<div class="product-label">
													<!-- si promo <span class="sale">-30%</span>
													<span class="new">NEW</span>-->
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">'.$row["category"].'</p>
												<h3 class="product-name"><a href="#">'.$row["name"].'</a></h3>
												<h4 class="product-price">'.$row["prix"].'€ <!--<del class="product-old-price">$990.00</del> si promo--></h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye"></i>Voir</button>
											</div>
										</div>
										</div>';
										$founded_products+=1;
								}

								mysqli_close($connection);

								?>
						</div>
						<div class="store-filter clearfix">
							<span class="store-qty"><?php echo $founded_products; ?> produits trouvé</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>
