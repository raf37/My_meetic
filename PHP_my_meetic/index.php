<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <script src="mainCarroussel.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <title>My_meetic</title>
</head>

<h1> My Meetic</h1>

<body>
<?php if (isset($_GET['error']) && $_GET['error']  == 'Badrequest1') {
    echo "Vous etes trop jeune";
}
if (isset($_GET['error']) && $_GET['error'] == 'Badrequest2') {
    echo"Password and confirm password pas pareil";
}
if (isset($_GET['error']) &&  $_GET['error'] == 'Badrequest3') {
    echo "Mail déjà existant";
}
?>

<form action="actionConnexion.php" method="post">
    <input type="submit" id="connexion" value="Connexion" >
</form>

<a href="inscription.php">Je m'inscris</a>


</body>
</html>