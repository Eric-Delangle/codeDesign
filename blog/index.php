<?php
session_start();

 //require ('controller/frontend.php');
 
require ('autoload.php');

 //declaration de ma variable $request pour les redirections
$request = $_GET['r'];

try { 
            if ($request == '') {
                require_once('controller/home.php');
                
            }
            elseif ($request == 'home') {
                require_once('controller/home.php');
            }
            elseif ($request == 'articles') {
                require_once('controller/frontend.php');
                showAllArticles();
            }
            elseif ($request == 'article') {
                require_once('controller/frontend.php');
                showOneArticle();
            }
            elseif ($request == 'commentaire') {
                require_once('controller/frontend.php');
                creatCom($_GET['number']);
            }
            elseif ($request == 'signal') {
                require_once('controller/frontend.php');
                signal($id, $number);
            }
            elseif ($request == 'edition') {
                require_once('controller/backend.php');
                sidejaco();
            }
             elseif ($request == 'inscription') {
                require_once('controller/backend.php');
                insc($_POST['pseudo'], $_POST['pass']);
            }
            elseif ($request == 'deco') {
                require_once('controller/backend.php');
                deco();
            }
            elseif ($request == 'saveArticle') {
                require_once('controller/backend.php');
                creatArt();
            }
            elseif ($request == 'supArt') {
                require_once('controller/backend.php');
                supArt();
            }
            elseif ($request == 'retablir') {
                require_once('controller/backend.php');
                unSignCom();
            }
            elseif ($request == 'supprimer') {
                require_once('controller/backend.php');
                supCom();
            }
            elseif ($request == 'modifier') {
                include('controller/backend.php');
                modifArt($article_number);
            }
            elseif ($request == 'majArticle') {
                require_once('controller/backend.php');
                updateArt($_GET['number']);
            }
            elseif ($request == 'precedent') {
                require_once('controller/frontend.php');
                before();
            }
            elseif ($request == 'suivant') {
                require_once('controller/frontend.php');
                after();
            }
            else {
                throw new Exception('Une erreur a été retournée. Vous allez être redirigé(e).');
            }
        }

        catch(Exception $e) { 
            echo 'Erreur : ' . $e->getMessage();
            header("Refresh:3;url=home");
        }


