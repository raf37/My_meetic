<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="mainCarroussel.js"></script>

    <title>Nouvel inscrit</title>
</head>

<h1>Bienvenue!</h1>
<body>

<?php

require_once "connection_bdd.php";
require_once "class.insc.php";

//if ($_POST['resultPassword'] !== $_POST['resultConfirmPassword']) {
//    echo "Connard mets les bon password omfg";
//    header('Location: inscription.php');
//}

$lolilol = new Person(
    $_POST['resultNom'],
    $_POST['resultPrenom'],
    $_POST['resultDate'],
    $_POST['resultSexe'],
    $_POST['resultVille'],
    $_POST['resultMail'],
    $_POST['resultPassword']
);

if ($lolilol->verifMail(
    $_POST['resultMail'],
    $_POST['resultDate'],
    $_POST['resultPassword']
) === true) {
    $lolilol->insertTo(
        $_POST['resultNom'],
        $_POST['resultPrenom'],
        $_POST['resultDate'],
        $_POST['resultSexe'],
        $_POST['resultVille'],
        $_POST['resultMail'],
        $_POST['resultPassword']
    );

    echo "Monsieur" . " " . $_POST['resultNom'];
    echo " " . $_POST['resultPrenom'];
    echo ", vous etes un " . $_POST['resultSexe'];
    echo " née le" . " " . $_POST['resultDate'];
    echo " à " . $_POST['resultVille'];
    echo ", votre adresse mail est : " . $_POST['resultMail'];
}

?>

<br>Les informations ne sont pas correcte? <a href="inscription.php">Cliquez ici</a><br>
Sinon connectez vous vite ! <a href="index.php">Acceuil</a>
</body>
</html>
