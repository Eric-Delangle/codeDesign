<?php 
ob_start(); 
//session_start();
?>
<script src = "https://cloud.tinymce.com/5/tinymce.min.js? apiKey = mibp5q8fc9tq6xnkjnimgpa1u02x01d45v2wt4mczl0uorhb "> </script>
        
   <script>
       tinymce.init({
    
        height : "600px",
        selector: 'textarea',
          init_instance_callback : function(editor) {
             var freeTiny = document.querySelector('.tox .tox-notification--in');
             freeTiny.style.display = 'none';
          }
       });
       
 </script>
       <div class="disposition">
         <form  action="deco" method="post">
            <input type="submit" id="deconnexion" class="liens_h1" value="Vous déconnecter">
         </form>
         <form  action="articles" method="post">
            <input type="submit" class="liens_h1" value="Les articles">
         </form>
 
      </div>
     


  <h1 class="messageDeBienvenue"><?php echo "Bienvenue  ".$_SESSION['pseudo']." dans l'interface d'administration de votre blog."?></h1>

<div class="cadre_tyni">
   
   <form action="saveArticle" method="POST" name="addarticle">
 
    <div>
       <div class="label_for">  Titre :
       </div>
         <input id="article_title" name="article_title" type="text"  placeholder="Titre de l'article" value="" required>
    </div>

   <div>
      <div class="label_for"> Article :
      </div>
        <input type="number" name="article_number" placeholder="Numéro de l'article" value="" required>                 
   </div>

<textarea name='contents' id ='contents'>
   
</textarea>


   <input type="submit" id="save_article" class="liens_h1" value="Sauvegarder">
</form>
</div>

<div id="vueArtMaj"> <!-- liste des articles en vue de les modifier -->
   <p><strong>Choisissez un article pour le mettre à jour : </strong></p>
   </div>
<!-- la va apparaitre la div de modification des articles --> 
<div class="cadre_interface">

   <?php
       while ($data = $allArt->fetch()) { 
   ?>
      <div class="cadre">
         <p>
            <?=$data['title']?>
         </p> 
          <p>
             <form action="modifier?number=<?=$data['article_number']?>" method="post">
               <input type="submit" class="liens_h1" value="modifier" name="modifier">
            </form>
            <form onSubmit="return okSupArt()" action="supArt?number=<?=$data['article_number']?>" method="post">
               <input type="submit" class="liens_h1" value="supprimer" name="supArt">
            </form>
         </p>
      </div>  
      <?php
       }
       ?>
</div>
<?php $content = ob_get_clean(); ?>
<script>
    function okSupArt(){
        if (confirm("Voulez vous vraiment supprimer cet article ?")) {
            return true;
        }
        else{
            return false;
        }
    }
    </script>
<?php require('view/backend/template.php'); ?>
