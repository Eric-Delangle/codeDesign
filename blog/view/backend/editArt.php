<?php
ob_start();
//numb();
?>
<link href="assets/css/style.css" rel="stylesheet" />
<script src = "https://cloud.tinymce.com/5/tinymce.min.js? apiKey = mibp5q8fc9tq6xnkjnimgpa1u02x01d45v2wt4mczl0uorhb "> </script>
        
<script>tinymce.init({
      selector: 'textarea',
 
      height : "600px",
      init_instance_callback : function(editor) {
         var freeTiny = document.querySelector('.tox .tox-notification--in');
         freTiny.style.display = 'none';
      }
     
   });
</script>

<a class="liens_h1" href="edition">Administration</a>

<h2>Mise à jour d'un article :</h2>

<div class="cadre_tyni">
   <div>
   <form onSubmit="return okModif()" action="majArticle?number=<?=$_GET['number']?>" method="POST" name="majarticle">
      
   <div class="label_for">  Titre :</div>
         <input id="article_title" name="title" type="text"  placeholder="Titre de l'article" value="" required>
      </div>
      
   <textarea name='contents' id ='contents'>
      <?php
         while ($data = $maj->fetch()) { 
      ?>
      
         <p>
            <?= $data['contents'] ?>
         </p>
      <?php
         }
      ?>
   </textarea>

      <input type="submit" id="maj_article" class="liens_h1" value="Mettre à jour">
   </form>
</div>
<?php
$content = ob_get_clean();

require('view/backend/template.php');
?>
 <script>
    function okModif(){
        if (confirm("Voulez vous vraiment modifier cet article ?")) {
            return true;
        }
        else{
            return false;
        }
    }
    </script>