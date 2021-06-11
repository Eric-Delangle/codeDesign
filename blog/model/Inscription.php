<?php


class Inscription extends DataBase
 {
     
     
     private $identifiant;
    private $pass;
    
    public function __construct($identifiant, $pass) {
       $this->identifiant = htmlspecialchars($identifiant);
       $this->pass = htmlspecialchars($pass);

    }

    public function register($identifiant, $pass){
     
        $db = $this->getPDO();
        $admin = $db->prepare('INSERT INTO members(pseudo, pass) VALUES(:pseudo, :pass)');
        $admin->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass_hache
            ));

    }
}