<?php 
session_start()
?>

<html lang="fr">

<head>
    <meta charset="utf-8" />
        <title>Accueil</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
</head>

<body>

<header>
<?php require 'include/nav.php'?>
</header>

<main>


   
        <section class="pre_index">
        <h2 class="h2_index">Nos lieux</h2>
         <h3> Trois lieux uniques, avec trois ambiances différentes</h3>
    </section>


    <section class="tableau_index_lieu">  
                    <article class="container_plage">
                        
                            <div class="img" id="in1"> </div>
                               
                <div class="zone_descri_index">
                                <h1 class="plage_index"> La plage</h1>
                                <p>Familial et convivial,<br/>  avec accès direct à la plage,<br/>  sera parfait pour découvrir les merveilles de la région. Farniente, promenades sur la côte, visites,<br/>  découvertes de la culture Bretonne, croisières vers les îles… Vous aurez l’embarras du choix !</p>
                </div>

                     </article>


                    
                    <article class="container_plage_n">
                        
                            <div class="img" id="in2"> </div>
                               
                <div class="zone_descri_index">
                                <h1 class="plage_index"> Les Pins</h1>
                                <p>Si vous tenez à des vacances plus sportives, axées sur les promenades, randonnées à pied, à vélo ou à VTT,<br/> le pays alentour vous offre un large choix.<br/> De même, si vous préférez les découvertes culturelles, il y a  de pittoresques villages à visiter</p>
                </div>

                     </article>


                    <article class="container_plage">
                        
                            <div class="img" id="in3"> </div>
                               
                <div class="zone_descri_index">
                                <h1 class="plage_index"> Le Maquis</h1>
                                <p>Le Maquis est un site perché sur un causse,<br/> adossé au pied de la Montagne Noire, et qui borde la vallée.<br/> C’est un lieu resté sauvage, car isolé de toute urbanisation,<br/> mais néanmoins accessible pour tous ceux qui souhaitent le découvrir.<br/> Il regorge de richesses, de par sa faune, sa flore, son histoire ,<br/> mais aussi grâce à toutes les expériences humaines que l’on peut vivre aujourd’hui en venant au Maquis...</p>
                </div>

                     </article>
    </section>     
    <section class="pre_index">
         <h2 class="h2_index">Nos activités</h2>
         <h3>Actuellement disponibles</h3>
    </section>
<section class="tableau_index_activites_1">

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img class="picsflip" src="img/activites/yoga.jpg" alt="Avatar" style="width:100%;height:100%;">
                    </div>
                    <div class="flip-card-back">
                        <p class="nom_acti">Yoga</p>
                            <ul class="list_acti">
                                <li>Seance Junior de 09h à 11h</li>
                                <li>Seance Adulte et Senior de 13h à 16h</li>
                            </ul>
                    </div>
                </div>
            </div>


            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img class="picsflip" src="img/activites/frisbee.jpg" alt="Avatar" style="width:100%;height:100%;">
                    </div>
                    <div class="flip-card-back">
                        <p class="nom_acti">Frisbee</p>
                        <ul class="list_acti">
                            <li>Materiel disponible de 10h à 18h</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img class="picsflip" src="img/activites/ski.jpg" alt="Avatar" style="width:100%;height:100%;">
                    </div>
                    <div class="flip-card-back">
                        <p class="nom_acti">Ski Nautique</p>
                        <ul class="list_acti">
                        <li>À partir de 16 ans</li>
                        <li>Acces gratuit & illimité avec le pass</li>
                        <li>Moniteur disponible de 15h à 18h30</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="tableau_index_activites">

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img class="picsflip" src="img/activites/dj_discotheque_nightbar.jpg" alt="Avatar" style="width:100%;height:100%;">
                    </div>
                    <div class="flip-card-back">
                        <p class="nom_acti">Notre discotheque!</p>
                    <ul class="list_acti">
                        <li>À partir de 16 ans</li>
                        <li>Soirée à themes 3 fois par semaines</li>
                        <li>Acces gratuit & illimité avec le pass</li>
                    </ul>
                    </div>
                </div>
            </div>
</section>



<section class="pre_index_contact">   
<h2 class="h2_index">Le staff reste à votre disponibilités pour toutes questions</h2>
    <section class="element_contact">
        <article class="info_contact">
            <p class="hs_contact">Happy Sardines</p>
            <p>06 06 06 06 06</p> 
            <p>2 rue des pouik, Hell, 666660</p>
        </article>

        <article class="map_index">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d542482.9616012815!2d102.43959667660052!3d57.9188101382114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5cf01196479edd49%3A0x5f5778cbd9e2858a!2sOblast%20d&#39;Irkoutsk%2C%20Russie%2C%20666660!5e0!3m2!1sfr!2sfr!4v1581900740831!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </article>
        
    </section>
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