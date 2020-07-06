<?php

class bdd{

    protected $connexion = "";

    public function connect(){
        $connect = mysqli_connect('Localhost', 'root', '', 'camping');
        //var_dump($connect);
        if($connect == false){
            return false;
        }
        $this->connexion = $connect;
    }
    public function close(){
        mysqli_close($this->connexion);
    }
}

//$test->requete("INSERT INTO `utilisateurs`( `nom`, `prenom`, `login`, `mdp`, `mail`, `permissions`) VALUES ('lulw','test','test','lulw','test@test.com','none')");
//$test->requete("SELECT nom FROM utilisateurs");
//var_dump($test);
?>