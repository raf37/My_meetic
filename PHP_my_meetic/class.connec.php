<?php

require_once "connection_bdd.php";
//require_once "class.insc.php";
class Connection //extends Person
{
    public $mail;
    public $password;


    /**
     * Connection constructor.
     * @param $mail
     * @param $password
     */
    public function __construct($mail, $password)
    {
        $this->mail = $mail;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function checkAlreadyRegister($bdd)
    {
        $queryAlreadyRegister = "SELECT * FROM information_client 
                                 WHERE email = :mail AND password = :password";
        $connexion = $bdd->prepare($queryAlreadyRegister);
        $connexion->bindParam(":mail", $this->mail);
        $connexion->bindParam(":password", $this->password);
        $connexion->execute();
        $result = $connexion->fetchAll(PDO::FETCH_ASSOC);
//        foreach ($result as $element) {
//
//        }
        $connexion->closeCursor();
        return $result;
    }

    public function verifConnect()
    {
        global $reqdb;
        $mailRegex = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
        if (preg_match($mailRegex, $this->mail)) {
            $isRegister = $this->checkAlreadyRegister($reqdb->bdd);
            if ($isRegister !== false) {
                session_start();
                foreach ($isRegister as $element) {
                    // recuperer que l'id pour + de perf
                    $_SESSION['id_membre'] = $element['id_membre'];
                    $_SESSION['prenom'] = $element['prenom'];
                    $_SESSION['nom'] = $element['nom'];
                    $_SESSION['date_de_naissance'] = $element['date_de_naissance'];
                    $_SESSION['sexe'] = $element['sexe'];
                    $_SESSION['ville'] = $element['ville'];
                    $_SESSION['email'] = $element['email'];
                    $_SESSION['password'] = $element['password'];
                    $_SESSION['active'] = $element['active'];
                }
                session_write_close();
            } else {
                header('Location: actionConnexion.php');
            }
        }
    }

    public function updateProfil($nom, $prenom, $date_naissance, $sexe, $ville, $mail, $password)
    {
        global $reqdb;
        $id = $_SESSION['id_membre'];
        // req pour select les info et compare le email au mail du post update
        $sqlSelectProfil = "SELECT email FROM information_client";
        $connexionSelect = $reqdb->bdd->prepare($sqlSelectProfil);
        $connexionSelect->execute();
        $result = $connexionSelect->fetchall(PDO::FETCH_ASSOC);
        //@todo password sha1 aussi pour update profil
        $mail = $_POST['resultModifMail'];
        $password = $_POST['resultModifPassword'];
        $confirmPassword = $_POST['resultModifConfirmPassword'];

        if ($password !== $confirmPassword) {
            header('Location: modifMyInfo.php?error=Badrequest1');
            return false;
        }
        if ($date_naissance < 18) {
            header('Location: modifMyInfo.php?error=Badrequest3');
            return false;
        }
        foreach ($result as $element) {
            if ($element['email'] == $mail) {
                header('Location: modifMyInfo.php?error=Badrequest2');
                return false;
            }
        }

        $sqlUpdateProfil = "UPDATE information_client SET nom = '$nom', prenom = '$prenom', 
    date_de_naissance = '$date_naissance', sexe = '$sexe', ville = '$ville', email = '$mail', password = '$password' 
    WHERE id_membre = '$id'";


        $connexion = $reqdb->bdd->prepare($sqlUpdateProfil);
        $connexion->execute();
        $connexion->closeCursor();
        $connexionSelect->closeCursor();// flemme de test
    }

    public function supprProfil()
    {
        // update all table de l'abo co et definir a null, si tt null l'abo peut plus se co
        //lors du
        global $reqdb;
        $id = $_SESSION['id_membre'];
        $sqlSupprProfil = "UPDATE information_client SET active = 0 WHERE id_membre = '$id'";
        $connexion = $reqdb->bdd->prepare($sqlSupprProfil);
        $connexion->execute(); // fonctionnel active est bien passé a 0, mtn dire que 0 = update tt les infos à NULL
        $connexion->closeCursor();
        session_write_close();
        header('Location: index.php');
    }

    public function reactiveProfil($resultSubmit)
    {
        // update all table de l'abo co et definir a null, si tt null l'abo peut plus se co
        global $reqdb;
        $id = $_SESSION['id_membre'];
        $sqlReactiveProfil = "UPDATE information_client SET active = 1 WHERE id_membre = '$id'";
        $connexion = $reqdb->bdd->prepare($sqlReactiveProfil);
        $connexion->execute(); // fonctionnel active est bien passé a 0, mtn dire que 0 = update tt les infos à NULL
        $connexion->closeCursor();
        session_write_close();
        header('Location: /register');
    }

    public function searchMembre($sexe, $date_naissance, $ville, $ville2)
    {
        global $reqdb;
        // attribuer les filtre a des variable POST pour les recher by filtre
        $sqlSearch = "SELECT * FROM information_client WHERE 1";

        if ($sexe != "") {
            $sqlSearch .= " AND sexe = '$sexe'";
        }

        if ($date_naissance === "18/25") {
            $sqlSearch .= " AND date_de_naissance BETWEEN 18 AND 25";
        }

        if ($date_naissance === "25/35") {
            $sqlSearch .= " AND date_de_naissance BETWEEN 25 AND 35"; // toute les date de naissance inferieur aussi
        }

        if ($date_naissance === "35/45") {
            $sqlSearch .= " AND date_de_naissance BETWEEN 35 AND 45"; // toute les date de naissance inferieur aussi
        }

        if ($date_naissance === "45+") {
            $sqlSearch .= " AND date_de_naissance >= 45"; // toute les date de naissance inferieur aussi
        }

        if ($ville != "") {
            $sqlSearch .= " AND (ville = '$ville' OR ville = '$ville2')";
        }
        if ($ville2 != "") {
            $sqlSearch .= " AND (ville = '$ville2' OR ville = '$ville')";
        }
//        var_dump($sqlSearch);
        $connexion = $reqdb->bdd->prepare($sqlSearch);
        $connexion->execute();
        $result = $connexion->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($result);
        foreach ($result as $element) {
            echo "<ul>";
            echo "<li>" .  $element['nom'] . "</li>";
            echo  "<li>" . $element['prenom'] . "</li> ";
            echo  "<li>" . $element['sexe'] . "</li> ";
            echo  "<li>" . $element['date_de_naissance']. "</li> ";
            echo  "<li>" . $element['ville'] . "</li> ";
            echo "</ul>";
        }
        $connexion->closeCursor();
    }
}
//$lol = new Connection();
//$lol->verifConnect();
