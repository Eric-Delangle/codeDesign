<?php
header('Content-type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title><?= $title ?>Blog d'un vieux jeune dev</title>
        <link href="assets/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
   
       <?= $content ?>
       <?= $comments ?>
    <div>
    <?= $comments ?>
    </div>
        <script>document.getElementById('accueil').style.display = 'block';</script>
        <script>document.getElementById('articles').style.display = 'none';</script>
        <script>document.getElementById('connecter').style.display = 'none';</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>