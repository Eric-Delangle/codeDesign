<?php
require ('view/nav.php');
//require ('model/router.php');
//session_start();
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link type="image/png" href="assets/images/favicon.png"/>
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="https://kit.fontawesome.com/7a0eba5609.js" crossorigin="anonymous"></script>
        <title>Blog d'un vieux jeune dev</title>
    </head>
<body>
</div>
        <div class="site">
            <div class="infos_sur_le_site">
          
        <?php
         echo"Pourquoi et surtout comment débuter le développement web à 47 ans.";
         ?>
         <br>
         <?php
            echo"Drôle d'idée mais j'avais déjà commencé avant.";
         ?>
         <br>
         <div id="anim" class="center">
                <video class="center" src="video/animation.mp4" autoplay muted></video>
            </div>
            </div>
            
            
            <div id="si_responsive">
               <?php
         echo"Pourquoi et surtout comment débuter le développement web à 47 ans.";
         ?>
         <br>
         <?php
            echo"Drôle d'idée mais j'avais déjà commencé avant.";
         ?>
            </div>       
        </div>
    <footer>
    </footer>  			 	
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     
        <script>document.getElementById('accueil').style.display ='none';</script>
    </body>
</html>