<?php

include 'blocks.php';

//Connected
if(!empty($_SESSION["connected"])){
	header('Location: account.php');
	return;
}

$error = "";

if(isset($_POST['submit'])){
	if(isset($_POST['mail'])&&strlen($_POST['mail'])>=6){
		if(isset($_POST['mdp'])&&strlen($_POST['mdp'])>6){
			if(isset($_POST['mdpconfirm'])&&strlen($_POST['mdpconfirm'])>6){
				if(isset($_POST['adresse'])&&strlen($_POST['adresse'])>6){
					if(isset($_POST['ville'])&&strlen($_POST['ville'])>=3){
						if(isset($_POST['codepostal'])&&strlen($_POST['codepostal'])>=4){
							if(isset($_POST['nom'])&&strlen($_POST['nom'])>=2){
								if(isset($_POST['prenom'])&&strlen($_POST['prenom'])>=2){
									if(isset($_POST['tel'])&&is_numeric($_POST['tel'])){
										
										if($_POST['mdp'] == $_POST['mdpconfirm']){

											$nom = $_POST['nom'];
											$prenom = $_POST['prenom'];
											$email = $_POST['mail'];
											$mdp = md5($_POST['mdp']);
											$adresse = $_POST['adresse'];
											$ville = $_POST['ville'];
											$codepostal = $_POST['codepostal'];
											$tel = $_POST['tel'];
											$pays = $_POST['pays'];


											$connection = new mysqli("localhost", "root", "", "kwish");
											if ($connection->connect_error){header('Location: index.php');}

									        $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");

									        if (mysqli_num_rows($result) > 0) {
									            $error="Ce compte existe déjà !";
									        } else {
									            //OK
												if ($connection->query("INSERT INTO users(id,nom,prenom,email,password,adresse,ville,pays,code_postal,tel,admin) VALUES('','$nom','$prenom','$email','$mdp','$adresse','$ville','$pays','$codepostal','$tel','0')") !== FALSE) {
													$connection->query("INSERT INTO panier(id,contenu,sss) VALUES('','','')");
													header('Location: connexion.php?successRegister=true');
												}
									        }

									        mysqli_close($connection);
											
										}else{
											$error = "Vos mot de passe ne correspondent pas !";
										}
									}else{
										$error = "Merci d'entrez un numéro de téléphone correcte !";
									}
								}else{
									$error = "Merci d'entrez votre prénom !";
								}
							}else{
								$error = "Merci d'entrez votre nom !";
							}
						}else{
							$error = "Merci d'entrez un code postal !";
						}
					}else{
						$error = "Merci d'entrez une ville !";
					}
				}else{
					$error = "Merci d'entrez une adresse !";
				}
			}else{
				$error = "Merci de confirmer votre mot de passe !";
			}
		}else{
			$error = "Merci d'entrez un mot de passe supérieur a 6 caractères !";
		}
	}else{
		$error = "Merci d'entrez une adresse mail !";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		
			head("Inscription");

			p_header(); 

		?>

		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Accueil</a></li>
						<li><a href="produits.php">Produits</a></li>
						<li><a href="connexion.php">Connexion</a></li>
						<li class="active"><a href="inscription.php">Inscription</a></li>
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
						<h3 class="breadcrumb-header">Inscription</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Accueil</a></li>
							<li class="active">Inscription</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="container">
			<h1>Compte</h1>
			<hr style="height:2px;color:black;background-color:black;width:100%;border:none;">
				<div class="row">

					<form method="post">

					  <div class="form-row">

						  <div class="form-group col-md-6">
						      	<label>Adresse email</label>
						      	<input type="email" class="form-control" name="mail" placeholder="Email">
						  </div>

						  <div class="form-group col-md-3">
						      	<label>Mot de passe</label>
						      	<input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe">
						  </div>

						  <div class="form-group col-md-3">
						      	<label>Confirmez le mot de passe</label>
						      	<input type="password" class="form-control" name="mdpconfirm" placeholder="Confirmez">
						  </div>

					  </div>

					  <div class="form-group">
					  	<div class="form-group col-md-8">
					  		<br>
					   		<h1>Vos infos</h1>
					   		<hr style="height:2px;color:black;background-color:black;width:150%;border:none;">
						</div>
					  </div>

						<div class="form-group">
					  	<div class="form-group col-md-6">
					   		<label>Adresse</label>
					    	<input type="text" class="form-control" name="adresse" placeholder="Rue du ....">
						</div>
					  </div>

					  <div class="form-row">

					    <div class="form-group col-md-3">
					      	<label>Nom</label>
					      	<input type="text" class="form-control" name="nom">
					    </div>

					    <div class="form-group col-md-3">
					      	<label>Prénom</label>
					      	<input type="text" class="form-control" name="prenom">
					    </div>

					  </div>
					  

					  <div class="form-row">

					    <div class="form-group col-md-3">
					      	<label>Ville</label>
					      	<input type="text" class="form-control" name="ville">
					    </div>

					    <div class="form-group col-md-3">
					      	<label>Code postal</label>
					      	<input type="text" class="form-control" name="codepostal">
					    </div>

					  </div>

					  <div class="form-row">

						<div class="form-group col-md-3">
						    <label>Pays</label>
						    <select class="form-control" name="pays">
						      <option>Belgique</option>
						      <option>France</option>
						      <option>Suisse</option>
						    </select>
						</div>

						<div class="form-group col-md-3">
					      	<label>N° de tel</label>
					      	<input type="tel" class="form-control" name="tel">
					    </div>

					</div>

					  <div class="form-row">
					   		<div class="form-group col-md-6">
					  			<input type="submit" class="btn btn-danger" name="submit" value="Inscription">
					  			<br><br><br>
					  			<?php
									if(strlen($error)>=2){
										echo '<p style="color:red;">'.$error.'</p>';
									}
								?>
					  		</div>

						</div>

					</form>
					
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>
