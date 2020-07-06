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
<meta charset="utf-8" />
        <title>Connexion</title> 
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
        <article class="window_co">
            <div class='overlay_co'></div>
                 <div class='content'>

                 <h1 class="titre_inscri"> Connexion </h1>
    <div class="input-fields"></div>
        <form action="connexion.php" method="post">
        
            <label>Login</label>
            <input type="text" name="login" required class='input-line full-width'><br>
            <label>Password</label>
            <input type="password" name="password" required class='input-line full-width'><br>

            <input type="submit" name="send" class='ghost-round full-width'>
        </form>
</article>
</section>
<section>
<?php
if(isset($_POST["send"])){
    if($_SESSION["user"]->connexion($_POST["login"],$_POST["password"]) == false){
        ?>
            <p>Un problème est survenue lors de la connexion veuillez vérifer vos informations de connexion</p>
        <?php
    }
    else{
        $_SESSION["user"]->connexion($_POST["login"],$_POST["password"]);
        $_SESSION["login"] = true;
        if($_SESSION['user']->getperm() == "admin"){
            $_SESSION["perm"] = true;
        }
        header('location:index.php');
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