<?php

//require 'model/DataBase.php';

class Connexion extends DataBase
 {

    private $identifiant;
    private $pass;
    
    public function __construct($identifiant, $pass) {
       $this->identifiant = htmlspecialchars($identifiant);
       $this->pass = htmlspecialchars($pass);

    }

    public function connecMembre($pseudo){
     
        $db = $this->getPDO();
        
        
        $admin = $db->prepare("SELECT pseudo, pass FROM members WHERE pseudo = :pseudo");
       
        $admin->execute(array(
            'pseudo' => $pseudo));
        $resultat = $admin->fetch();
    
       
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
      // $isPasswordCorrect = true;

        if ($isPasswordCorrect) {
             
                session_start();
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['pass'] = $resultat['pass'];
                header('location: edition');
            }
            else {
                
                ?>
                <script language="javascript">
                    alert("Vos informations sont incorrectes(pass).");
                </script>
    
            <?php 
            }
        }
    }



