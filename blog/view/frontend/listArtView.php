<?php
header('Content-type: text/html; charset=UTF-8');
ob_start(); 
require('nav.php');
while ($data = $allArt->fetch()) {
?>

    <div  class="tableau">
    
        <h3>
           
            <?= htmlspecialchars($data['title']) ?>
           
        </h3>
        
        <p>
            
            <?= htmlspecialchars(substr($data['contents'], 3, 25)) ?>
          ...
        
        </p>
        <p>
        <a class="liens_h1" href="article?number=<?=$data['article_number']?>">Lire l'article</a>
        </p>
    </div>
<?php
}

$allArt->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

