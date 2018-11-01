<?php

require_once "connection_bdd.php";
require_once "class.connec.php";

session_start();
if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}
$lolilol = new Connection($_SESSION['email'], $_SESSION['password']);

//$lolilol->reactiveProfil($_POST['ResultReactiveProfil']); // fonctionne mais direct pas ac le submit
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="mainCarroussel.js"></script>

    <title> Reactivation </title>
</head>
<h1> Reactivation  </h1>

<H2> Voulez-vous reactivez votre compte ? </H2>

<form action="reactive.php" method="post">
    <p><input type="submit" value="Reactivation" name="ResultReactiveProfil"/></p>
</form>

<a href="index.php"> Retourner à l'acceuil</a>
<body>

</body>

<?php
// SI isset($_POST["ResultRea"] => reactive profil

if (isset($_POST["ResultReactiveProfil"])) {
    $lolilol->reactiveProfil($_POST['ResultReactiveProfil']);
}

?>
</html>



