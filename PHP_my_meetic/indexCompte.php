<?php
require_once "connection_bdd.php";
require_once "class.insc.php";
require_once "class.connec.php";



$lolilol = new Connection($_POST['resultMailCo'], $_POST['resultPasswordCo']);
$reqdb = $lolilol->verifConnect();


//ici appeler fonction active, si 1 np, si 0 demander si le man veut la reactivation du compte, si oui update active a 1
// chemin = le man se co, si active 0, header loc vers reactive.php
// probleme renvoi vers index ac session destroy donc pas possible de verifier sessionactive 0

session_start();


if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}

if ($_SESSION['active'] == "0") { //session destroy peut etre ca
    header('location:./reactive.php');
}




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script language="JavaScript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="mainMenuDeroulant.js"></script>
    <title> Bienvenue</title>
</head>

<body>

<ul id="navbar">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">Chat</a></li>
    <li><a href="rechercheMembre.php">Recherche l'ame soeur</a></li>
    <li><a href="monCompte.php">Mon compte</a></li>
    <li><a href="deco.php">Deconnexion</a></li>
</ul>

<br><br><br>
<br><br>


<ul class="navigation">
    <li class="toggleSubMenu"><span>Informations personnel</span>
        <ul class="subMenu">
            <li><?php echo $_SESSION['sexe']; ?></li>
            <li><?php echo $_SESSION['nom']; ?></li>
            <li><?php echo $_SESSION['prenom']; ?></li>
            <li><?php echo $_SESSION['date_de_naissance']; ?></li>
            <li><?php echo $_SESSION['ville']; ?></li>
        </ul>
    </li>

</body>
</html>
