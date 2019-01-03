<?php

include 'blocks.php';

$connected = false;
//Connected
if(!empty($_SESSION["connected"])){
	$connected = true;
}

$error = "";
$good = "";
if(isset($_POST["submit"])){

	if(isset($_POST["email"])&&!empty($_POST["email"])){
		if(isset($_POST["message"])&&!empty($_POST["message"])){

			$email = $_POST["email"];
			$message = $_POST["message"];

			$connection = new mysqli("localhost", "root", "", "kwish");
			if ($connection->connect_error){header('Location: index.php');}

			if ($connection->query("INSERT INTO contact(id,email,message) VALUES('','$email','$message')") !== FALSE) {
				$good = "Message envoyé !";
				header("Refresh: 3; URL=contact.php");
			}

			mysqli_close($connection);
		}else{
			$error = "Entrez un message !";
		}
	}else{
		$error = "Entrez une adresse email !";
	}

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
					<form method="post">
					  <div class="form-group">
					    <label>Adresse email</label>
					    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Votre adresse email" required="true">
					  </div>
					  <div class="form-group">
					    <label>Votre message</label>
					    <textarea type="text" name="message" class="form-control" placeholder="Message..." rows="8" required="true"></textarea>
					  </div>
					  <input type="submit" name="submit" class="btn btn-danger" value="Envoyer">
					  <br><br>
					  <?php
							if(strlen($error)>=2){
								echo '<p style="color:red;">'.$error.'</p>';
							}
							if(strlen($good)>=2){
								echo '<p style="color:green;">'.$good.'</p>';
							}
						?>
					</form>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>
