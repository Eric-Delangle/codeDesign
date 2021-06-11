<?php
//session_start();

require_once('autoload.php');


function sidejaco() { 
    if(empty($_SESSION['pseudo'])) {
            admin();
    } else {
        listArtForModif();
        affichSign();
    }
}

function admin() {
    
    require_once('view/backend/viewConnecForm.php');
      
    if(isset($_POST['valider'])) {
        if(empty(htmlspecialchars($_POST['pseudo'])) || empty(htmlspecialchars($_POST['pass']))) {
            ?>
                <script>
                    alert("Tous les champs doivent être remplis.");
                </script>
            <?php 
    }  
        else { 
            
           $logg = new Connexion($_POST['pseudo'], $_POST['pass']);
            $logg->connecMembre($_POST['pseudo']);  
         
        }
    }
}        
      
function deco() { 
    session_destroy();
    header('location: home');
}

function creatArt() { 
    $save = new CrudArticles();
    $save->createArticle('article_number', 'title', 'contents', 'date_parution');
}

function listArtForModif() {
    $objetArticle = new CrudArticles();
    $allArt = $objetArticle->showArticles();
    require('view/backend/viewEdit.php');
}


function modifArt($article_number) {
    $modif = new CrudArticles();
    $maj = $modif->showArticle($_GET['number']);
    require('view/backend/editArt.php');
}


function updateArt($article_number) {
    $updat = new CrudArticles();
    $maj = $updat->updateArticle($_POST['title'], $_POST['contents']);
    //require('view/backend/editArt.php');
}


function supArt() {
    $suppr = new CrudArticles();
    $suppr->deleteArticle($_GET['number']);
        if($suppr->article_number == null) {
            echo 'Cet article a bien été supprimé. Vous allez être redirigé.';
            header("Refresh:3;url=edition");
        }
}


function affichSign() {
    $signMess = new Crudcomments();
    $signal = $signMess->getSignComments();
    require('view/backend/signalement.php');
}
 
function supCom() {
    $modifCom = new Crudcomments();
    $modifCom->deleteComment();
        if($modifCom->id == null) {
            echo 'Le commentaire a bien été supprimé. Vous allez être redirigé.';
            header("Refresh:3;url=edition");
        }
}


function unSignCom() { 
    $modifcom = new Crudcomments();  
    $modifs = $modifcom->updateComment();
        if($modifs->signalement == 0){
            echo 'Le commentaire a bien été rétabli. Vous allez être redirigé.';
            header("Refresh:3;url=edition");
        }
    
}



