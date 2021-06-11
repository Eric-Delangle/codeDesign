<?php
require_once('autoload.php');
ob_start(); 
//session_start();
include('view/nav.php');

?>

        <div class="bloc_form">
            <form action="edition" method="post">
                    <?php
                     $inscForm = new FormInscConnec ($data);
                    
                        echo $inscForm->input('pseudo',"Votre pseudo");
                        echo $inscForm->inputPass('pass',"Votre mot de passe");
                        //$inscForm->getValue($_POST['']);
                        echo $inscForm->submit();
                    ?>
            </form>
        </div>
        <script>document.getElementById('accueil').style.display = 'block';</script>
        <script>document.getElementById('connecter').style.display = 'none';</script>
 

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>  