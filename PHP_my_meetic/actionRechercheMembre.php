<?php

require_once "connection_bdd.php";
//require_once "class.insc.php";
require_once "class.connec.php";

session_start();
if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}

$lolilol = new Connection($_SESSION['email'], $_SESSION['password']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="mainCarrousel.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <title> Resultat Recherche</title>
</head>

<ul id="navbar">
    <li class="active"><a href="indexCompte.php">Home</a></li>
    <li><a href="#">Chat</a></li>
    <li><a href="rechercheMembre.php">Recherche l'ame soeur</a></li>
    <li><a href="monCompte.php">Mon compte</a></li>
    <li><a href="deco.php">Deconnexion</a></li>
</ul>
<br><br><br><br><br><br>

<h1>Voici les resultat </h1>


<!--</div>-->
<?php

$lolilol->searchMembre
($_POST['resultRechercheSexe'],
    $_POST['resultRechercheAge'],
    $_POST['resultRechercheVille'],
    $_POST['resultRechercheVille2']
);
?>


<body>

</body>
</html>