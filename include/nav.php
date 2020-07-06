<?php
date_default_timezone_set('UTC');


if (isset($_SESSION['login']))
 {
    $login = $_SESSION['login'];
    $today = date("d.m.y")
?>
<h2 class="titre_index_header_part_a">Le camping</h2>
<h1 class="titre_index_header_part_b">Happy Sardines</h1>
<div class="co_nav">



 </div> 

 
<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="profil.php">Mon profil</a></li>
        <li><a href="reservation.php">Reservation</a>
        <?php 
        if(isset($_SESSION['perm'])){
        ?>
        <li><a href="admin.php">Admin</a>
            <?php
        }
        ?>
    </ul>
 </nav>
 <form  action="index.php" method="post">
	               <input name="deconnexion" value="Se Deconnecter" type="submit" class='ghost-round full-width' />
            </form>
				
		<?php
		if (isset($_POST["deconnexion"]))
            {
         session_unset();
         session_destroy();
         header ('location:index.php');
            }
		?>

 
<?php 

}
else
 {
?>

<h2 class="titre_index_header_part_a">Le camping</h2>
<h1 class="titre_index_header_part_b">Happy Sardines</h1>
<nav>
    <ul>
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="inscription.php"> Inscription</a></li>
            <li><a href="connexion.php"> Connexion</a></li> 
            <li><a href="connexion.php">Reservation</a>   
     </ul>
</nav>

<?php
 }
?>