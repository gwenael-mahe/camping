<?php 
include "class/bdd.php";
include "class/resa.php";
include "class/user.php";
session_start();
//function select date/lieu/emplacement + prix total
?>

<html>

<head>
        <title>Réservation</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>

<header>
<?php require 'include/nav.php'?>
</header>

<main>
<section class="container_reserv">



<h1 class="titre_reserv">Bonjour</br>&</br> Bienvenue sur la page de reservation !</h1>
<article class="box_reserv">    
<form  action="" method="post">
<h2> 1 . Selection de votre créneaux : </h2>
            <div class="creneaux">
                <div class="checkin">
            <label for="checkin">Date d'arrivée</label><br/>
                <input type="date" name="checkin" required /><br/>
                </div>
                <div class="checkout">
            <label for="checkout">Date de départ</label><br/>
                <input type="date" name="checkout" required /><br/>
           </div>
           </div>
            <h2> 2 . Vôtre équipement : </h2>
            <label for="equipement">Quel équipement possédez vous ?</label><br/>
            <select name="equipement" required>
                    <option value="tente">Tente</option>
                    <option value="car">Camping-car</option>
            </select><br/>
            <h2>3 . Cochez les options que vous désirez :</h2>
                <div class="option">
                <div>
                    <input type="checkbox" id="borne" name="borne">
                        <label for="borne">Borne électrique</label>
                </div>

                <div>
                        <input type="checkbox" id="disco-club" name="disco-club">
                        <label for="disco-club">Accès disco-club</label>
                </div>
                <div>
                        <input type="checkbox" id="pack" name="pack">
                        <label for="pack">Pack Yoga - Frisbee - Ski Nautique</label>
                </div>
                </div>
            <input type="submit" name="confirm" class='ghost-round full-width'>
        </form>
<?php 

    $pins = false;
    $plage = false;
    $maquis = false;
    $resa = new reservation();
    $getid = $_SESSION['user']->getid();

if(isSet($_POST['confirm']))
{   
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $checkout = strtotime($checkout);
    $checkin = strtotime($checkin);
    $currentdate = date("Y-m-d");
    $currentdate = strtotime($currentdate);
   if($checkin >= $currentdate && $checkin < $checkout)
   {
    $checkin = $_POST['checkin'];
    $resa->checkin = $checkin;
    $checkout = $_POST['checkout'];
    $resa->checkout = $checkout;
    $options = 0;
    $equipement = 0;
    $takenmaquis = 0;
    $takenplage = 0;
    $takenpins = 0;
    $borne = false;
    $disco = false;
    $pack = false;
    $getcheckin = "";
    if($_POST['equipement'] == "tente") {
    $equipement = 1;
    }
    if  ($_POST['equipement'] == "car"){
    $equipement = 2;
    }

    $resa->emplacement = $equipement;

    if(isSet($_POST['borne']))
    {   
        $borne = true;
        $options++;
    }
    if(isSet($_POST['disco-club']))
    {
        $disco = true;
        $options++;
    }
    if(isSet( $_POST['pack']))
    {   
        $pack = true;
        $options++;
    }
    
    
    $resa->checkdate($checkin, $checkout, $takenmaquis, $takenplage, $takenpins, $equipement);
    $pins = $resa->checkdate($checkin, $checkout, $takenmaquis, $takenplage, $takenpins, $equipement)[0];
    $maquis = $resa->checkdate($checkin, $checkout, $takenmaquis, $takenplage, $takenpins, $equipement)[1];
    $plage = $resa->checkdate($checkin, $checkout, $takenmaquis, $takenplage, $takenpins, $equipement)[2];
    $resa->options($borne, $disco, $pack);
    $resa->getborne = $resa->getOptions($borne, $disco, $pack)[0];
    $resa->getpack = $resa->getOptions($borne, $disco, $pack)[1];
    $resa->getdisco = $resa->getOptions($borne, $disco, $pack)[2];
    $resa->getOptions($borne, $disco, $pack);
    $resa->getcheckin = ($getcheckin = date("Y-m-d", strtotime($resa->getCheckin())));
    $resa->getcheckout = ($getcheckout = date("Y-m-d", strtotime($resa->getCheckout())));
    $resa->getEmplacement = $resa->getEmplacement();
    $resa->getprice = $resa->getPrices($checkin, $checkout, $borne, $disco, $pack);

    //var_dump($resa->getborne);
    //var_dump($resa->getpack);
    //var_dump($resa->getdisco);
    //var_dump($resa->getOptions($borne, $disco, $pack));

    //var_dump($resa->getcheckin);
    $_SESSION['checkin'] = $resa->getcheckin();
    $_SESSION['checkout'] = $resa->getcheckout();
    $_SESSION['emplacement'] = $resa->getemplacement();
    $_SESSION['options'] = $resa->options($borne, $disco, $pack);
    $_SESSION['prices'] = $resa->getprices($checkin, $checkout, $borne, $disco, $pack);

?>

<form  action="" method="post">
        <h2>4 . Lieu :</h2>
            <label for="lieu">Quel lieu voulez vous réserver ?</label><br/>
            <select name="lieu" required>
                    <option name="pins" value="pins" <?php if($pins == false)
                                                echo "disabled"?> >Les Pins</option>
                    <option name="maquis" value="maquis" <?php if($maquis == false)
                                                echo "disabled"?>>Le Maquis</option>
                    <option name="plage" value="plage" <?php if($plage == false)
                                                echo "disabled"?>>La Plage</option>
            </select>
            <br/>
            <article class="recap">
            <h2>5 . Récapitulatif </h2>
            
            <input type="date" name="check-in"
       value="<?php echo $resa->getcheckin; ?>" disabled><br/>
       <input type="date" name="check-out"
       value="<?php echo $resa->getcheckout; ?>" disabled><br/>
       <span> Vous utilisez <?php echo $resa->emplacement;?> place(s).</br>
            Vous avez selectionné
            <?php
           if($resa->getborne == false && $resa->getpack == false && $resa->getdisco == false)
            {
                ?>
                aucune
                <?php
            }
           else
           {
              echo $resa->getborne;
              echo $resa->getpack;
              echo $resa->getdisco;
              echo "comme";
           }
            ?>
            option(s).<br>
            Votre réservation vous couteras 
            <?php
             echo $resa->getprice;
                ?>
                euros</span><br/>
                </article>
            <input type="submit" name="valid" class='ghost-round full-width'><br/>
        </form>
        </article>   
        <?php
        }
        else
        {
            echo "les dates ne sont pas valides";
        }
    }
    if(isset($_POST['valid']))
    {

        $lieuplage = false;
        $lieupins = false;
        $lieumaquis = false;
        
        //var_dump($_POST);
    
        if(isset($_POST['lieu']) && $_POST['lieu'] == "pins") 
        {
            $lieupins = true;
        }
        if(isset($_POST['lieu']) && $_POST['lieu'] == "maquis")
        {
            $lieumaquis = true;
        }
        if(isset($_POST['lieu']) && $_POST['lieu'] == "plage")
        {
            $lieuplage = true;
        }
    
        $_SESSION['lieu'] = $_POST['lieu'];
        $resa->lieu($lieupins, $lieumaquis, $lieuplage);
        $checkin = $_SESSION['checkin'];
        $checkout = $_SESSION['checkout'];
        $lieu = $_SESSION['lieu'];
        $emplacement = $_SESSION['emplacement'];
        $options = $_SESSION['options'];
        $prices = $_SESSION['prices'];
        $resa->insert($checkin, $checkout, $lieu, $emplacement, $options, $prices,$getid);
        //var_dump($options);
        //var_dump($resa->insert($getid));


    }

?>
</section>
</main>

<footer>
<section class="menu_foot">
        <div class="newsletter">
            <p>Pour recevoir nos offres et promotions:</p>
            <form type="submit">
                    <input type="email" required>
                    <input type="submit">
            </form>
           
        </div>
        <p>© 2020 Gwen,Solenn & Sarah</p>
    </section>  

</footer>

</body>

</html>

<?php
// var_dump($_SESSION);
// var_dump($_SESSION['lieu']);
// var_dump($_SESSION['checkin']);
// var_dump($_SESSION['checkout']);
// var_dump($_SESSION['prices']);
// var_dump($_SESSION['emplacement']);
// var_dump($_SESSION['options']);
?>