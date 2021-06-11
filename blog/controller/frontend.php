<?php

require_once('autoload.php');
// ARTICLES


function showAllArticles() {
    
    $viewAllArt = new CrudArticles();
    $allArt = $viewAllArt->showArticles();
    require_once('view/frontend/listArtView.php');
}

function showOneArticle() {
    $viewOneArt = new CrudArticles();
    $readArticle = $viewOneArt->showArticle($_GET['number']); 
        foreach ($readArticle as $data) { 
            require('view/frontend/oneArtView.php');
        }
        // si il n'y a pas de chapitre avant ne pas afficher le lien "precedent"
        if($_GET['number'] == 1){
            ?>
            <script>document.getElementById('precedent').style.display ='none';</script>
            <?php
        }
        // si il n'y a pas d'article après ne pas afficher le lien "suivant"
      

        if($data['title'] == null) {
            
             ?>
             <div class="redirectMessage">
                 <?php
                 echo"Cet article n'a pas encore été redigé. Vous allez être redirigé(e).";
                 ?>
             </div>
                <?php 
          
            header("Refresh:3;url=articles");
        }     
        
}

function signal($id, $number) { 
    $alertComm = new Crudcomments();
    $alert = $alertComm->signalCom($_GET['id'], $_GET['number']);
}
  
// COMMENTAIRES 

function showCom() {    
// pour générer mon formulaire de commentaire
//require('model/FormInscConnec.php');
    $commentForm = new FormInscConnec($data); 
// puis appel de la méthode d'affichage
    $objetComment = new Crudcomments();
    $allCom = $objetComment->getComments(); 
    require('view/frontend/listComView.php');  
}

function creatCom($id) { 

    if(empty(htmlspecialchars($_POST['auth'])) && empty(htmlspecialchars($_POST['contenuComment']))) {
        ?>
            <script>
                alert("Tous les champs doivent être remplis. Vous allez être redirigé(e).");
            </script>
        <?php
     header("Refresh:3;url=chapter?number=".$_GET['number']."");
    }

    if(!empty(htmlspecialchars($_POST['auth'])) && !empty(htmlspecialchars($_POST['contenuComment']))) {
        $objetComment = new Crudcomments();
        $com = $objetComment->createComment();
    }
}

// aller au chapitre suivant
function after() { 
    $read = new CrudArticles();
    $read->getNextNumber($_GET['number']);   
}
// aller au chapitre precedent
function before() { 
  
    $read = new CrudArticles();
    $read->getLastNumber($_GET['number']); 
        
}
