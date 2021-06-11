<?php
require ('model/DataBase.php');

/*
class CRUD for use all sql's commands
*/
class CrudArticles extends DataBase
{
    
    // la j'affiche la page articles avec tous ses articles les uns sous les autres
    public function showArticles(){ 
        $db = $this->getPDO();
        $allArticles = $db->query("SELECT *, DATE_FORMAT(date_parution, '%d/%m/%Y')
        AS date_parution_fr FROM articles ORDER BY article_number ");
        return $allArticles;  
    }

    // au click sur le lien j'affiche l'article demandé
    public function showArticle($article_number) {
        $db = $this->getPDO();
        $art = $db->prepare("SELECT *, DATE_FORMAT(date_parution, '%d/%m/%Y')AS date_parution_fr 
        FROM articles WHERE article_number = ?"); 
        $art->execute(array($article_number));
        return $art;
    }

    // je crée un article
    public function createArticle ($article_number, $title, $contents, $date_parution) {
        $db = $this->getPDO();
        $req = $db->prepare("INSERT INTO articles(article_number, title, contents, date_parution)
        VALUES(:article_number, :article_title, :contents, now())"); 
        $req->execute(array(
                            'article_number' => $_POST['article_number'],
                            'article_title' => $_POST['article_title'], 
                            'contents' => $_POST['contents']));
        echo 'Cet article a bien été créé. Vous allez être redirigé.';
        header("Refresh:3;url=edition");
    } 
    
    // je mets à jour l'article
    public function updateArticle($title, $contents) {
        $db = $this->getPDO();
        $req = $db->prepare("UPDATE articles SET title = :title,
                                                 contents = :contents 
            WHERE article_number = ".$_GET['number']." ");
        $req->execute(array('title' => $title, 'contents' => $contents));
        echo 'Cet article a bien été mit à jour. Vous allez être redirigé.';
        header("Refresh:3;url=edition");   
    }

    // je supprime l'article
    public function deleteArticle($article_number) {
        $db = $this->getPDO();
        $req = $db->prepare("DELETE FROM articles WHERE article_number = ? "); 
        $req->execute(array($article_number));
        $del = $db->prepare("DELETE FROM comments WHERE article_number = ? "); 
        $del->execute(array($article_number));
    }  
    
    // article suivant ou précédent

    
    public function getLastNumber($article_number) { 
        
        // la faudrai que je sache si il y a un article avant celui sur lequel je suis
        
        if(!empty($article_number)) { 
            $article_number--;
            header("location: article?number=".$article_number."");
        } 
     
    }

    public function getNextNumber($article_number) {
        
        if(!empty($article_number)) { 
            $article_number++;
            header("location: article?number=".$article_number."");
          }
    }
}