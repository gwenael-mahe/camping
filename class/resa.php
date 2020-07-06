<?php

class reservation extends bdd
{
    public $id = "";
    public $checkin = "";
    public $checkout = "";
    public $lieu = "" ;
    public $emplacement = "";
    public $services = "";
    public $prix = "";
    public $id_utilisateur = "";
    public $pins = false;
    public $maquis = false;
    public $plage = false;
    public $optionborne = "";
    public $optiondisco = "";
    public $optionpack = "";
    public $getcheckin = "";
    public $getcheckout = "";
    public $borne = false;
    public $pack = false;
    public $disco = false;
    public $prixborne = "0";
    public $prixdisco = "0";
    public $prixpack = "0";
    public $prices = "";
    public $duration = "";

    public function checkdate($checkin, $checkout, $takenmaquis, $takenplage, $takenpins, $equipement)
    {

        if($checkin != NULL && $checkout != NULL)
        {
            $this->checkin = $checkin;
            $this->checkout = $checkout;
            $this->emplacement = $equipement;
            $this->connect();
            $requete = "SELECT lieu, emplacement FROM reservations WHERE checkin >= $checkin <= checkout AND checkin >= $checkout <= checkout AND lieu = \"Pins\"";
            $query = mysqli_query($this->connexion, $requete);
            $resultat = mysqli_fetch_all($query);

                //var_dump($resultat);

                foreach($resultat as list($lieu, $emplacement))
                {
                    $emplacement = (int)$emplacement;

                    $takenpins +=$emplacement;
                }
                if(($takenpins + $equipement) <= 4)
                {
                    $this->pins = true;
                }

                $requete = "SELECT lieu, emplacement FROM reservations WHERE checkin >= $checkin <= checkout AND checkin >= $checkout <= checkout AND lieu = \"Maquis\"";
                $query = mysqli_query($this->connexion, $requete);
                $resultat = mysqli_fetch_all($query);

                foreach($resultat as list($lieu, $emplacement))
                {
                    $emplacement = (int)$emplacement;

                    $takenmaquis +=$emplacement;
                }
                if(($takenmaquis + $equipement) <= 4)
                {
                    $this->maquis = true;
                }


                $requete = "SELECT lieu, emplacement FROM reservations WHERE checkin >= $checkin <= checkout AND checkin >= $checkout <= checkout AND lieu = \"Plage\"";
                $query = mysqli_query($this->connexion, $requete);
                $resultat = mysqli_fetch_all($query);

                //var_dump($resultat);

                foreach($resultat as list($lieu, $emplacement))
                {
                    $emplacement = (int)$emplacement;

                    $takenplage +=$emplacement;
                }
                if(($takenplage + $equipement) <= 4)
                {
                    $this->plage = true;
                }

                    }
        
        return [$this->pins, $this->maquis, $this->plage];
    }


    

public function options($borne, $disco, $pack)
{   

    if($borne == true)
    {   
        $this->borne = true;
        $this->optionborne = "borne,";
    }
    else
    {
        $this->optionborne = "";
    }
    if($disco == true)
    {
        $this->disco = true;
        $this->optiondisco = "disco,";
    }
    else
    {
        $this->optiondisco = "";
    }
    if($pack == true)
    {
        $this->pack = true;
        $this->optionpack = "pack,";
    }
    else
    {
        $this->optionpack = "";
    }

    $this->services = $this->optionborne.$this->optiondisco.$this->optionpack;

    return($this->services);
}


public function lieu($lieupins, $lieumaquis, $lieuplage)
{
    if($lieupins == true)
    {
        $this->lieu = "Pins";
    }
    else
    {
        $this->lieu = "";
    }
    if($lieumaquis == true)
    {
        $this->lieu = "Maquis";
    }
    else
    {
        $this->lieu = "";
    }
    if($lieuplage == true)
    {
        $this->lieu = "Plage";
    }
    else
    {
        $this->lieu = "";
    }

    return($this->lieu);
}



public function getCheckin()
{
    return($this->checkin);
}

public function getCheckout()
{
    return($this->checkout);
}

public function getEmplacement()
{
    return($this->emplacement);
}

public function getOptions($borne, $disco, $pack)
{
    if($this->borne == true)
    $this->borne = "la borne électrique,";
    if($this->pack == true)
    $this->pack = "le pack Yoga, Frisbee et Ski nautique,";
    if($this->disco == true)
    $this->disco = "l'accès au disco-club,";

    return[$this->borne, $this->pack, $this->disco];
}

public function getPrices($checkin, $checkout, $borne, $disco, $pack)
{
    $this->connect();
    $requete = "SELECT prix FROM prix ";
    $query = mysqli_query($this->connexion, $requete);
    $resultat = mysqli_fetch_all($query);

    if($borne == true)
    {
        $prixborne = implode($resultat[1]);
    } else {
        $prixborne = "0";
    }
    if($disco == true)
    {
        $prixdisco = implode($resultat[2]);
    } else {
        $prixdisco = "0";
    }
    if($pack == true)
    {
        $prixpack = implode($resultat[3]);
    } else {
        $prixpack = "0";
    }
    $priceday = $resultat[0];
    $mercienzo = implode($priceday);

    $price = ($prixpack) + ($prixborne) + ($prixdisco);
    $price2 = $price + $mercienzo;
    // $duration = date_diff($this->checkin, $this->checkout);
    $duration = ((strtotime($this->checkout) - strtotime($this->checkin)) / 86400);
    $this->prices = $price2 * $duration;
    // echo date_diff($this->checkin, $this->checkout);


    return($this->prices);
}

public function insert($checkin, $checkout, $lieu, $emplacement, $options, $prices,$getid)
{
    $this->connect();
    $sql = "INSERT INTO reservations SET checkin = '$checkin' , checkout = '$checkout' , lieu = '$lieu' , emplacement = '$emplacement' , options = '$options' , prix = $prices , id_utilisateur = $getid";
    //echo $sql;
    $query = mysqli_query($this->connexion, $sql);

}


}