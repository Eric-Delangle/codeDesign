<?php 
ob_start(); 
include('view/nav.php');

        ?>
            <div class="tableau">
                <h3>
                    <?= $data['title'] ?>
                    
</h3>
                    <?= $data['contents'] ?>
                 Paru le: 
                    <?= $data['date_parution_fr'] ?>
                 
            </div>
<div id='precsuiv'>
    <form method="post" action="precedent?number=<?=$_GET['number']?>">
        <input type="submit" class="liens_h1" id="precedent" value="precedent" name="precedent"/>
    </form>
    <form method="post" action="suivant?number=<?=$_GET['number']?>">
        <input type="submit" class="liens_h1" id="suivant" value="suivant" name= "suivant" />
    </form>
</div>
<?php
showCom($_GET['id']); // j'appelle ma fonction pour afficher les commentaires
$readArticle->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
