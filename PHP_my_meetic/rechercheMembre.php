<?php
require_once "connection_bdd.php";
//require_once "class.insc.php";
require_once "class.connec.php";

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
    <script src="mainCarroussel.js"></script>

    <ul id="navbar">
        <li class="active"><a href="indexCompte.php">Home</a></li>
        <li><a href="#">Chat</a></li>
        <li><a href="rechercheMembre.php">Recherche l'ame soeur</a></li>
        <li><a href="monCompte.php">Mon compte</a></li>
        <li><a href="deco.php">Deconnexion</a></li>
    </ul>
    <br><br><br><br><br><br>


    <h1> Quel type de personne recherchez vous ? </h1>

<form action="actionRechercheMembre.php" method="post">
    rechercher Homme, Femme ? <select id="monselect" name="resultRechercheSexe">
        <option value="Homme"> Homme</option>
        <option value="Femme"> Femme</option>
        <option value="Autre"> Autre</option>
    </select>
    Quel age ? <select id="monselect" name="resultRechercheAge">
        <option value="18/25"> 18/25</option>
        <option value="25/35"> 25/35</option>
        <option value="35/45"> 35/45</option>
        <option value="45+"> 45+</option>
    </select>
<!--    Quel age ? <input type="date" name="resultRechercheAge">-->
    Ville 1 <input type="text" name="resultRechercheVille">
    Ville 2 <input type="text" name="resultRechercheVille2">
    <p><input type="submit" value="Rechercher ! "></p>

</form>


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
