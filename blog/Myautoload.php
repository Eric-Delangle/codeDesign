<?php

class Myautoload {

    public static function start() {

        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/blog/');
        define('ROOT', $root.'/blog/');

        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('MODEL', ROOT.'model/');

        define('ASSETS', HOST.'assets/');
    }

    public static function autoload($class) {
        try { 
            $class = str_replace('\\', '', $class);
            if(file_exists(MODEL.$class.'.php')) {
                include_once(MODEL.$class.'.php');
            } 
            else if(file_exists(CONTROLLER.$class.'.php')) {
                include_once(CONTROLLER.$class.'.php');
            } 
            
            else if(file_exists(VIEW.$class.'.php')) {
                include_once(VIEW.$class.'.php');
            } 
            else {
                throw new Exception('Une erreur a été retournée. Vous allez être redirigé(e).');
            }
        }
        catch(Exception $e) { 
            echo 'Erreur : ' . $e->getMessage();
            header("Refresh:3;url=home");
        }   
    }
}
