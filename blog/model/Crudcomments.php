<?php
//require ('model/DataBase.php');

/*
class CRUD for comments view and use all sql's comments commands
*/
class Crudcomments extends CrudArticles
{
    
    // je récupère la liste de tous les commentaires

    public function getComments() {
        $db = $this->getPDO();
        $com = $db->query("SELECT *,DATE_FORMAT(date_comment, '%d/%m/%Y à %Hh%i minutes')
        AS date_comment_fr FROM comments  WHERE article_number = '".$_GET['number']."' ORDER BY date_comment DESC "); 
        return $com;
    }
    
    // je recupère les coms signalés pour les modifier
    public function getSignComments() {
        $db = $this->getPDO();
        $signCom = $db->query("SELECT * FROM comments WHERE signalement = 1"); 
        return $signCom;    
    }

    // je crée un commentaire
    public function createComment () { 
        // Captcha
        // Ma clé privée
        $secret = "6Ld0ZssZAAAAANJhGKGXZ-NA7fNHtjUkDlWkaCps";
        // Paramètre renvoyé par le recaptcha
        $response = $_POST['g-recaptcha-response'];
        // On récupère l'IP de l'utilisateur
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip ;

        $decode = json_decode(file_get_contents($api_url), true);

        if ($decode['success'] == true) {
            // le code de vérification est correct
            $db = $this->getPDO();
            $req = $db->prepare('INSERT INTO comments (article_number, auth, comment, date_comment)VALUES (:article_number, :auth, :comment, now())');
            $req->execute(array('article_number' => htmlspecialchars($_GET['number']),'auth' => htmlspecialchars($_POST['auth']),'comment' => htmlspecialchars($_POST['contenuComment'])));
        ?>
            <script>
                alert("Votre commentaire a bien été enregistré. Vous allez être redirigé(e).");
            </script>
        <?php
            header("Refresh:3;url=article?number=".$_GET['number']."");
        }

        else {
            // le code de vérification est incorrect
        ?>
            <script>
                alert("Veuillez préciser que vous n'êtes pas un robot. Vous allez être redirigé(e).");
            </script>
        <?php
            header("Refresh:3;url=article?number=".$_GET['number']."");
        }
    }
        
    // je rétablis le commentaire signalé
    public function updateComment() {
        $db = $this->getPDO();
        $db->query("UPDATE comments SET signalement = 0 WHERE id = '".$_GET['id']."' ");
    }

    // je supprime le commentaire signalé
    public function deleteComment() {
        $id = $_GET['id'];
        $db = $this->getPDO();
        $req = $db->prepare("DELETE FROM comments WHERE id = $id ");   
        $req->execute(array($id));
    }

    // je signale un commentaire
    public function signalCom($id) {
     
        $db = $this->getPDO();
        $signal = $db->prepare("UPDATE comments SET signalement = 1
        WHERE id = ?");
        $signal->execute(array($id));
       
       ?>
        <script>
            alert("Ce commentaire a bien été signalé. Vous allez être redirigé(e).");
        </script>
    <?php
       
         header("Refresh:3;url=article?number=".$_GET['article_number']."");
        }
    }