<?php

include 'blocks.php';


if(empty($_SESSION["connected"])){
	header("Location: connexion.php");
	return;
}

$connected = true;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
		
			head("Compte");

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

							<li class="active"><a href="account.php">Mon compte</a></li>

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
						<h3 class="breadcrumb-header">Votre compte</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Accueil</a></li>
							<li class="active">Mon compte</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<h3 class="breadcrumb-header">Vos informations</h3>
					<hr style="height:2px;color:black;background-color:black;width:100%;border:none;">
					<table class="table table-bordered">
					  <tbody>
					    <tr>
					      <td scope="row" class="col-md-3">
					      	<strong>Nom :</strong>
					      	<div style="float: right;display: inline;">
					      		<button type="button" class="btn btn-secondary">Modifier</button>
					      	</div>
					      	<br><?php echo $_SESSION["nom"]; ?>
					      </td>
					    </tr>

					    <tr>
					      <td scope="row" class="col-md-3">
					      	<strong>Prénom :</strong>
					      	<div style="float: right;display: inline;">
					      		<button type="button" class="btn btn-secondary">Modifier</button>
					      	</div>
					      	<br><?php echo $_SESSION["prenom"]; ?>
					      </td>
					    </tr>

					    <tr>
					      <td scope="row" class="col-md-3">
					      	<strong>Email :</strong>
					      	<div style="float: right;display: inline;">
					      		<button type="button" class="btn btn-secondary">Modifier</button>
					      	</div>
					      	<br><?php echo $_SESSION["email"]; ?>
					      </td>
					    </tr>

					  </tbody>
					</table>
				</div>
				<div class="row">
					<h3 class="breadcrumb-header">Adresse</h3>
					<hr style="height:2px;color:black;background-color:black;width:100%;border:none;">
					<table class="table table-bordered">
					  <tbody>
					  	<?php

					  	$connection = new mysqli("localhost", "root", "", "kwish");
						if ($connection->connect_error){header('Location: index.php');}

						$id=$_SESSION['id'];

				        $result = mysqli_query($connection, "SELECT adresse,ville,pays,code_postal,tel FROM users WHERE id='$id'");

				        if (mysqli_num_rows($result) > 0) {
				            foreach(mysqli_fetch_assoc($result) as $key => $value){
							  echo '<tr>
					      <td scope="row" class="col-md-3">
					      	<strong>'.$key.' :</strong>
					      	<div style="float: right;display: inline;">
					      		<button type="button" class="btn btn-secondary">Modifier</button>
					      	</div>
					      	<br>'.$value.'
					      </td>
					    </tr>';
							}
				        }

				        mysqli_close($connection);
					  	?>

					  </tbody>
					</table>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>
