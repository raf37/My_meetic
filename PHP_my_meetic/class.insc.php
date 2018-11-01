<?php

require_once "connection_bdd.php";

class Person //extends Database
{
    public $nom;
    public $prenom;
    public $date_naissance;
    public $sexe;
    public $ville;
    public $mail;
    public $password;

    // => Constructeur
    public function __construct($nom = NULL, $prenom = NULL, $date_naissance = NULL, $sexe = NULL, $ville = NULL, $mail = NULL, $password = NULL)
    {
        $this->nom = $nom;
        $this->prenom = $prenom; //htmlspecialchars($_POST["resultPrenom"]);
        $this->date_naissance = $date_naissance;  //htmlspecialchars($_POST["resultDate"]);
        $this->sexe = $sexe;
        $this->ville = $ville; //htmlspecialchars($_POST["resultVille"]);
        $this->mail = $mail; //htmlspecialchars($_POST["resultMail"]);
        $this->password = $password; //htmlspecialchars($_POST["resultPassword"]);

//        var_dump($this->nom);
    }

    /**
     * @return mixed
     */
    public function getNom()
    {

        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
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

//    public function passwordVerify($passwordHash)
//    {
//        global $reqdb;
//        $sqlPassword = "SELECT password FROM information_client";
//        $connexion = $reqdb->bdd->prepare($sqlPassword);
//        $connexion->execute();
//        $result = $connexion->fetchAll(PDO::FETCH_ASSOC);
////        foreach ($result as $element) {
////            var_dump($element['password']); // renvoi tout les password == OK
////        }
////        password_verify($_POST['resultPassword'], $passwordHash);
//    }

    public function insertTo($nom, $prenom, $date_naissance, $sexe, $ville, $mail, $password)
    {
        global $reqdb;
        $lol = $reqdb->bdd->prepare("INSERT INTO information_client(nom, prenom, date_de_naissance, sexe, ville, email, password) 
                              VALUE( ?, ?, ?, ?, ?, ?, ?)");
        //@todo sha1 le password rentré dans la bdd
        // choper le post du password, le hash et le mettre dans la bdd (attention a la verif confirm password)
        //var_dump($passwordHash); // password hashé OK
//        $this->passwordVerify($passwordHash);

        $lol->execute(array($nom, $prenom, $date_naissance, $sexe, $ville, $mail, $password));
    }



    public function verifMail($mail, $date_naissance, $password)
    {
        global $reqdb;
        $lol = $reqdb->bdd->prepare("SELECT email, date_de_naissance, password FROM information_client");
        $lol->execute();
        $donnees = $lol->fetchAll(PDO::FETCH_ASSOC);
        $mail = $_POST['resultMail'];
        $date_naissance = $_POST['resultDate'];
        $password = $_POST['resultPassword'];
        $confirmPass = $_POST['resultConfirmPassword'];
//        var_dump($donnees);
        // affichage erreur inscription
        foreach ($donnees as $element) {
            if ($element['email'] == $mail) { //&& $element['date_de_naissance'] < 2000-01-01 ) {
                header('Location: index.php?error=Badrequest3');
                return false;
            }
            if ($password !== $confirmPass) {
                header('Location: index.php?error=Badrequest2');
                return false;
            }
            if ($date_naissance < 18) {
                header('Location: index.php?error=Badrequest1');
                return false;
            }
        }
        return true;
    }
}

//$lol = new Person();
//$lol->verifMail();
