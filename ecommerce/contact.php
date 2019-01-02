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
		
			head("Contact");

			p_header(); 

		?>

		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Accueil</a></li>
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
						
						<li class="active"><a href="contact.php">Contact</a></li>
						<li><a href="about.php">A propos</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Contactez-nous !</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Accueil</a></li>
							<li class="active">Contact</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<form>
					  <div class="form-group">
					    <label>Adresse email</label>
					    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Votre adresse email">
					  </div>
					  <div class="form-group">
					    <label>Votre message</label>
					    <textarea type="text" class="form-control" placeholder="Message..." rows="8"></textarea>
					  </div>
					  <input type="submit" class="btn btn-danger" value="Envoyer">
					</form>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>
