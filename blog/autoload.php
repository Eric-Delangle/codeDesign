<?php
  function myAutoload($class) {
    
       require_once('model/CrudArticles.php');
       require_once('model/Crudcomments.php');
       require_once('model/FormInscConnec.php');
       require_once('model/Connexion.php');
       require_once('model/Inscription.php');
       require_once('model/DataBase.php');
       
      /*
        try { 
        
          // $class = str_replace('', '/', $class);
            var_dump($class);
            
            if(file_exists('model/.$class.php')) {
                var_dump($class);
                require_once('model/.$class.php');
            } 
            elseif(file_exists('blog/model/.$class.php')) {
                var_dump($class);
                require_once('blog/model/.$class.php');
            } 
             elseif(file_exists('.$class.php')) {
                var_dump($class);
                require_once('.$class.php');
            } 
            else {
                throw new Exception('Une erreur a été retournée. Vous allez être redirigé(e)merde.');
            }
        }
        catch(Exception $e) { 
            echo 'Erreur : ' . $e->getMessage();
            header("Refresh:3;url=home");
        }   
        */
        
    }

 spl_autoload_register('myAutoload');