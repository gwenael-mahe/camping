<?php 
require 'class/bdd.php';
require 'class/user.php';
require 'class/admin.php';
session_start();



if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}
if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = new admin();
}

?>

<html>

<head>
        <title>Admin</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>

<header>
<?php require 'include/nav.php'?>
</header>

    <main>

    <section class="container_admin">
        <article class="window_admin">
            <div class='overlay_admin'></div>
                 <div class='content'>


                <h1 class="titre_inscri"> Panneau de l'admin ! </h1>
<div class="input-fields"></div>
<form action="admin.php" method="post">

    <label>Prix du lieu*</label>
    <input type="text" name="lieu" required class='input-line full-width'><br>
    <input type="submit" name="sendlieu" class='ghost-round full-width'>
</form>
<?php
if(isset($_POST['sendlieu'])){
    $_SESSION["admin"]->lieu($_POST["lieu"]);
}
?>
<form action="admin.php" method="post">
    <label>Prix de la borne*</label>
    <input type="text" name="borne" required class='input-line full-width'><br>
    <input type="submit" name="sendborne" class='ghost-round full-width'>
</form>
<?php
if(isset($_POST['sendborne'])){
    $_SESSION["admin"]->lieu($_POST["borne"]);
}
?>
<form action="admin.php" method="post">
    <label>Prix des activitées*</label>
    <input type="text" name="acti" required class='input-line full-width'><br>
    <input type="submit" name="sendacti" class='ghost-round full-width'>
</form>
<?php
if(isset($_POST['sendacti'])){
    $_SESSION["admin"]->lieu($_POST["acti"]);
}
?>
<form action="admin.php" method="post">
    <label>Prix du club*</label>
    <input type="mail" name="club" required class='input-line full-width'><br>
    <input type="submit" name="sendclub" class='ghost-round full-width'>
</form>
<?php
if(isset($_POST['sendclub'])){
    $_SESSION["admin"]->lieu($_POST["club"]);
}
?>
<p>* Prix actuel</p>
<?php $_SESSION["admin"]->tableau(); ?>



<h1 class="titre_inscri">Reservations Recap'</h1>
        


<?php $_SESSION["admin"]->tableauresa(); ?>
     
            
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
