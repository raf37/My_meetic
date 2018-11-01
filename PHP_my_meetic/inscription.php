<?php
 require_once "connection_bdd.php";
//require_once "class.insc.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css/javascript" href="style.css">
    <script>
        var verifAge = prompt("Quel âge avez-vous?");
        if (verifAge >= 18){
            alert("Vous pouvez vous inscrire!")
        }
        else {
            alert("T'es trop jeune Quentin!")
            document.location.href="index.php";
        }

        // var password = document.getElementById('mdp');
        // var confirmPassword = document.getElementById('mdpConfirm');
        // console.log(password);
        //
        // if (password.lenght < 8){
        //     password.style.color = "red";
        // }

    </script>

    <title> Inscription My_meetic</title>
</head>

<h1> Inscription</h1>
<body>

<!--<div class="form">-->
<form action="actionInscription.php" method="post">
    Nom <input type="text" name="resultNom" value="Nom">
    Prenom <input type="text" name="resultPrenom" value="Prenom">
    Age <input type="text" name="resultDate">
    sexe <select id="monselect" name="resultSexe">
        <option value="Homme"> Homme</option>
        <option value="Femme"> Femme</option>
        <option value="Autre"> Autre</option>
    </select>

<!--    </select>-->

    Ville <input type="text" name="resultVille" value="Ville">
    Mail <input type="email" name="resultMail" value="Email">
    Mot de passe <input type="password" name="resultPassword" id="mdp"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Doit contenir 1 chiffre, 1 maj et 1 minuscule, 8 caracteres au moins" required/>
    Confirm mot de passe <input type="password" name="resultConfirmPassword"
                                id="mdpConfirm"  required/>
    <p><input type="submit" value="OK"></p>
</form>
<!--</div>-->
</body>
</html>


