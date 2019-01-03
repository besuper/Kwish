<?php

include 'blocks.php';

$connection = new mysqli("localhost", "root", "", "kwish");
if ($connection->connect_error){header('Location: index.php');}

$contenu = getSessionPanier();

$sss = getSss();

$id = $_SESSION["id"];

$connection->query("UPDATE `panier` SET `contenu` = '$contenu' WHERE `panier`.`id` = '$id'");
$connection->query("UPDATE `panier` SET `sss` = '$sss' WHERE `panier`.`id` = '$id'");

mysqli_close($connection);

unset($_SESSION["id"]);
unset($_SESSION["connected"]);
unset($_SESSION["nom"]);
unset($_SESSION["prenom"]);
unset($_SESSION["email"]);

close_panier();

header("Location: index.php");

?>