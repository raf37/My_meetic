<?php

session_start();
if (empty($_SESSION)) {
    header('location:./actionConnexion.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script language="JavaScript" type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script language="JavaScript" type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="mainMenuDeroulant.js"></script>

    <title> Mes infos </title>
</head>

<ul id="navbar">
    <li class="active"><a href="indexCompte.php">Home</a></li>
    <li><a href="#">Chat</a></li>
    <li><a href="rechercheMembre.php">Recherche l'ame soeur</a></li>
    <li><a href="monCompte.php">Mon compte</a></li>
    <li><a href="deco.php">Deconnexion</a></li>
</ul>
<br><br><br><br><br><br>
<h1>Mes informations </h1>
<p><?php echo $_SESSION['nom'] ?></p>
<p><?php echo $_SESSION['prenom'] ?></p>
<p><?php echo $_SESSION['date_de_naissance'] ?></p>
<p><?php echo $_SESSION['sexe'] ?></p>
<p><?php echo $_SESSION['ville'] ?></p>
<p><?php echo $_SESSION['email'] ?></p>
<p><?php echo $_SESSION['active'] ?></p>

<a href="modifMyInfo.php">Modifier mon profil</a>

<form action="actionSupprProfil.php" method="post">
    <p><input type="submit" value="Supprimer mon compte" name="ResultSupprProfil"/></p>
</form>

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
<body>

</body>
</html>

