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
if($_SESSION['user']->isConnected() != false){
    header('Location:index.php');
}

?>

<html>

<head>
        <title>Inscription</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>

<header>
<?php require 'include/nav.php'?>
</header>

    <main>

    <section class="container">
        <article class="window">
            <div class='overlay'></div>
                 <div class='content'>

                 <h1 class="titre_inscri"> Inscription </h1>
    <div class="input-fields"></div>
        <form action="inscription.php" method="post">
        
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
</article>
</section>
<section>
<?php
if(isset($_POST['send'])){
    if($_SESSION["user"]->inscription($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "log"){
        ?>
            <p>Login ou Email déjà prit</p>
        <?php
    }
    if($_SESSION["user"]->inscription($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "empty"){
        ?>
            <p>Veuillez remplir tout les champs</p>
        <?php
    }
    if($_SESSION["user"]->inscription($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "mdp"){
        ?>
            <p>Les mots de passes ne sont pas identiques</p>
        <?php
    }
    if($_SESSION["user"]->inscription($_POST['nom'],$_POST['prenom'],$_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "ok"){
        ?>
            <p>Votre compte a était crée</p>
        <?php
    }
    
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