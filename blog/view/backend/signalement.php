<?php ob_start(); 
?>
<div id="vueComSign"> <!-- liste des commentaires signalés -->
  <p><strong>Voici les commentaires signalés : </strong></p>
</div>
<!-- la va apparaitre la div de modification ou de suppression des commentaires -->
<div class="cadre_interface">
   <?php
 
     while ($sign = $signal->fetch()) {
   ?>
     <div id="cadre_comSign">
        <p><strong>Auteur:</strong> 
           <?= $sign['auth'] ?>
       </p>
        <p><strong>Commentaire:</strong>
           <?= $sign['comment'] ?>
        </p>
        <p> <strong>Posté le:</strong> 
           <?= $sign['date_comment'] ?>
        </p>
           <form onSubmit="return okRet()" action="retablir?id=<?=$sign['id']?>" method="post">
              <input type="submit" class="liens_h1" value="rétablir" name="retablir">
           </form>
           <form onSubmit="return okSup()" action="supprimer?id=<?=$sign['id']?>" method="post">
              <input type="submit" class="liens_h1" value="Supprimer" name="supprimer">
           </form>
      </div>
   <?php  
     }
   
   ?>
</div>
<?php
$signal->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<script>
    function okSup(){
        if (confirm("Voulez vous vraiment supprimer ce commentaire ?")) {
            return true;
        }
        else{
            return false;
        }
      }
    </script>
    <script>
    function okRet(){
        if (confirm("Voulez vous vraiment rétablir ce commentaire ?")) {
            return true;
        }
        else{
            return false;
        }
      }
    </script>
<?php require('view/frontend/template.php'); ?>