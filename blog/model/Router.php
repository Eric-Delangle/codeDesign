<?php

/*
* Class Router
*
*create roads and find controller
*/
Class Router 
{

    
    public $request ;

    public function __construct($request) {
        $this->request = $request;
    }
    public function renderController() {

       // if (isset($this->request)) {

            if ($this->request == '')
            {
            require ('controller/home.php');
            echo "home";
            }

            elseif ($this->request == 'home') 
            {
            require ('controller/home.php');
            echo"home";
            }

            elseif ($this->request == 'site') 
            {
            echo "site";
            }

            elseif ($this->request == 'articles') 
            {
            require (CONTROLLER.'frontend.php');
            showAllArticles();
            }
        
            elseif ($this->request == 'edition')
            {
                require (CONTROLLER.'backend.php');
                echo"edition";
                sidejaco();
            }
       // }
            else {
                echo '<p class="erreur">OOOoooohh grosse erreur 404</p>';
            }
            
    }
    
}

