<?php

include 'blocks.php';

$good = '';
//New user
if(isset($_GET["successRegister"])){
	if(strpos($_GET["successRegister"], "true") !== false){
		$good = 'Félicitation! Votre compte a bien été créer. Vous pouvez maintenant vous connectez!';
	}
}

if(!empty($_SESSION["connected"])){
	header('Location: account.php');
	return;
}

$error = "";

//Connexion
if(isset($_POST['submit'])){
	if(isset($_POST['email'])&&strlen($_POST['email'])>=1){
		if(isset($_POST['password'])&&strlen($_POST['password'])>1){

			$email = $_POST['email'];
			$mdp = $_POST['password'];

			$connection = new mysqli("localhost", "root", "", "kwish");
			if ($connection->connect_error){header('Location: index.php');}

			$result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");

			if (mysqli_num_rows($result) > 0) {
				
				while($row = mysqli_fetch_assoc($result)) {
	               if(strpos($row["email"], $email) !==false && strpos($row["password"], md5($mdp)) !==false){
	               		$_SESSION["connected"] = true;

	               		$_SESSION["id"] = $row["id"];
	               		$_SESSION["nom"] = $row["nom"];
	               		$_SESSION["prenom"] = $row["prenom"];
	               		$_SESSION["email"] = $row["email"];

	               		//Gestion du panier ========
	               		//Format de l'array du panier
	               		/*
						
						ID_PRODUCT => contents(quantity => 1)end(ID_PRODUCT)
						ID_PRODUCT_2 => contents(quantity => 1)end(ID_PRODUCT_2)

	               		*/

	               		$panier = "";
	               		$id = $row["id"];
						$result = mysqli_query($connection, "SELECT contenu,sss FROM panier WHERE id='$id'");
						if (mysqli_num_rows($result) > 0) {
				            while($row = mysqli_fetch_assoc($result)) {
				               $panier = $row["contenu"];
				               setSss($row["sss"]);
				            }
				        }

						$_SESSION["panier"] = $panier;

	               		//==========================

	               		header("Location: index.php");
	               }
	            }

			} else {
				//OK
				$error = "Erreur dans l'email ou le mot de passe !";
			}

			mysqli_close($connection);

		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		
			head("Connexion");

			p_header(); 

		?>

		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Accueil</a></li>
						<li><a href="produits.php">Produits</a></li>
						<li class="active"><a href="connexion.php">Connexion</a></li>
						<li><a href="inscription.php">Inscription</a></li>
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
						<h3 class="breadcrumb-header">Connexion a votre compte</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Accueil</a></li>
							<li class="active">Connexion</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<?php
						if(strlen($good)>=2){
							echo '<p style="color:green;">'.$good.'</p>';
							header("Refresh: 2; URL=connexion.php");
						}
					?>
					<form method="post">
					  <div class="form-group">
					    <label>Adresse email</label>
					    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Votre adresse email">
					  </div>
					  <div class="form-group">
					    <label>Mot de passe</label>
					    <input type="password" name="password" class="form-control" placeholder="Mot de passe">
					  </div>
					  <input type="submit" name="submit" class="btn btn-danger" value="Connexion">
					  <?php
						if(strlen($error)>=2){
							echo '<p style="color:red;">'.$error.'</p>';
						}
					?>
					</form>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>
