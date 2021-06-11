<?php

//use PDO;

class DataBase {

    // la je crée un accesseur
    public function getPDO() {
        //if($this->pdo === null){
        //$this->$db_name = $db_name;
        $pdo = new PDO('mysql:host=91.234.195.181;dbname=cp999767p08_blog;charset=utf8', 'cp999767p08_admin', 'junfanpol76');
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$this->pdo = $pdo;
       // }
        return $pdo;
    }
}