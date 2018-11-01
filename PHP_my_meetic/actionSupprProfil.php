<?php

require_once "connection_bdd.php";
require_once "class.connec.php";

session_start();
if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}

$lolilol = new Connection($_SESSION['email'], $_SESSION['password']);

$lolilol->supprProfil(); // if supprProfil est fait lancer la fonction qui update tt les infos necessaire à NULL

//$lolilol->updateSuppr();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="mainCarroussel.js"></script>

    <title> Supprimer profil </title>
</head>
<h1>Votre profil à été supprimé </h1>

<body>

</body>
</html>
