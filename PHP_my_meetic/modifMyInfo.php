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
    <script src="mainCarroussel.js"></script>

    <title> Modif profil </title>
</head>

<ul id="navbar">
    <li class="active"><a href="indexCompte.php">Home</a></li>
    <li><a href="#">Chat</a></li>
    <li><a href="rechercheMembre.php">Recherche l'ame soeur</a></li>
    <li><a href="monCompte.php">Mon compte</a></li>
    <li><a href="deco.php">Deconnexion</a></li>
</ul>
<br><br><br><br><br><br>
<h1>Modifier mon profil </h1>

<form action="updateProfil.php" method="post">
    Modifier nom <input type="text" name="resultModifNom" value="Nom">
    Modifier prenom <input type="text" name="resultModifPrenom" value="Prenom">
    Modifier sexe <input type="text" name="resultModifSexe" required/>
    Modifier Age <input type="text" name="resultModifDate">
    Modifier ville <input type="text" name="resultModifVille" value="Ville">
    Modifier mail <input type="email" name="resultModifMail" value="Email">
    Modifier mot de passe <input type="password" name="resultModifPassword" class="mdp" value="Password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Doit contenir 1 chiffre, 1 maj et 1 minuscule, 8 caracteres au moins" required/>
    Confirm mot de passe <input type="password" name="resultModifConfirmPassword"
                                class="mdpConfirm" value="confirmPassword" required/>
    <p><input type="submit" value="Update"></p>

</form>


<body>
<?php if (isset($_GET['error']) && $_GET['error']  == 'Badrequest1') {
    echo "Password and confirm password pas pareil";
}

if (isset($_GET['error']) && $_GET['error']  == 'Badrequest2') {
    echo "Email dejà existant";
}
if (isset($_GET['error']) && $_GET['error']  == 'Badrequest3') {
    echo "Trop jeune gamin ! ";
}
?>

</body>
</html>
