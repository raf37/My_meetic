<?php

require_once "connection_bdd.php";
require_once "class.connec.php";

session_start();
if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}



$lolilol = new Connection($_SESSION['email'], $_SESSION['password']);

$lolilol->updateProfil(
    $_POST['resultModifNom'],
    $_POST['resultModifPrenom'],
    $_POST['resultModifDate'],
    $_POST['resultModifSexe'],
    $_POST['resultModifVille'],
    $_POST['resultModifMail'],
    $_POST['resultModifPassword']
);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="mainCarroussel.js"></script>

    <title> Profil update </title>
</head>
<h1>Votre profil à été update </h1>
<h2>Merci de vous reconnectez après votre modif</h2>

<a href="index.php">revenir à l'accueil</a>
<body>


</body>
</html>
