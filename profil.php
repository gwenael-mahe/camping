<?php 
require 'class/bdd.php';
require 'class/user.php';


session_start();

if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}
if($_SESSION['user']->isConnected() != true){
    header('Location:index.php');
}?>
<html>

<head>
        <title>Profil</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>

<header>
<?php require 'include/nav.php'?>
</header>

<main>
<section class="container_profil">
        <article class="window_profil">
            <div class='overlay_profil'></div>
                 <div class='content'>
    <h1 class="titre_inscri"> Mon profil </h1>
    <div class="input-fields"></div>
            <form class='modif_profil' action="profil.php" method="post">
                <label>Login</label>
                <input type="text" name="login" required class='input-line full-width'><br>
                <label>Prénom</label>
                <input type="text" name="prenom" required class='input-line full-width'><br>
                <label>Nom</label>
                <input type="text" name="nom" required class='input-line full-width'><br>
                <label>Mail</label>
                <input type="mail" name="mail" required class='input-line full-width'><br>
                <label>Password</label>
                <input type="password" name="password" required class='input-line full-width'><br>
                <label>Password confirm</label>
                <input type="password" name="passwordconf" required class='input-line full-width'><br>
                <input type="submit" name="send" class='ghost-round full-width'>
                </form> 
            
        <h1 class="titre_inscri">Reservations</h1>
        

            <table class="table_profil">
                <tbody>
                
            <?php
         
         $i = 0;
          
           

 $connexion = mysqli_connect("localhost", "root", "", "camping");
 $id = $_SESSION["user"]->getid();
 $select_last =  "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE utilisateurs.id = $id";
 $query_last = mysqli_query($connexion, $select_last);
 
 
 //test debug//
 
 if (!$query_last) {
   printf("Error: %s\n", mysqli_error($connexion));
    exit();
}
//test debug//





 while($donnees = mysqli_fetch_array($query_last))
 {
     ?>
      
    <tr>
    <th>Nom</th>    
    <th>Date</th>
    <th>Lieu</th> 
    <th>Option(s)</th>
    <th>Prix</th>
    
    </tr>
                <td><?php echo  $donnees['nom']; ?></td>
                <td><?php echo  $donnees['checkin']; ?></td> 
                <td><?php echo  $donnees['lieu']; ?></td>
                <td><?php echo  $donnees['options']; ?></td>
                <td><?php echo  $donnees['prix']. '€';  ?></td>

                <tr>
                <td></td> 
                <td><?php echo  $donnees['checkout']; ?></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                </tr>
                
            
            

        
        
   
       
   
    
<?php
}
$i++
?>
    
    </tbody> 
    </table>
    
    
                 </div> 
    </article>
        </section>

<?php
if(isset($_POST["send"])){
    if(!empty($_POST["passwordconf"])){
        if(!empty($_POST["login"])){
            $_SESSION['user']->profil($_POST["passwordconf"],$_POST["login"],NULL,NULL,NULL,NULL);
        }
        if(!empty($_POST["prenom"])){
            $_SESSION['user']->profil($_POST["passwordconf"],NULL,$_POST["prenom"],NULL,NULL,NULL);
        }
        if(!empty($_POST["nom"])){
            $_SESSION['user']->profil($_POST["passwordconf"],NULL,NULL,$_POST["nom"],NULL,NULL);
        }
        if(!empty($_POST["mail"])){
            $_SESSION['user']->profil($_POST["passwordconf"],NULL,NULL,NULL,$_POST["mail"],NULL);
        }
        if(!empty($_POST["password"])){
            $_SESSION['user']->profil($_POST["passwordconf"],NULL,NULL,NULL,NULL,$_POST["password"]);
        }
    }
    else{
        ?>
            <p>Veuillez rentrer votre ancien mot de passe pour valider vos changements</p>
        <?php
    }
}

?>

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