<?php

/*
* Class FormInscConnec
*
*create a formulaire
*/

class FormInscConnec
{
    private $data;
    public $paragraph = 'p';

    public function __construct($data = array()){
        $this->$data = htmlspecialchars($data);
    }
// pour englober mes inputs dans des paragraphes
    private function paragraph ($html) {
        return "<{$this->paragraph}>{$html}</{$this->paragraph}>";
    }
// Pour récuperer le contenu de mes champs si ils sont définis
    private function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
// je crée mon premier input
    public function input($name, $placeholder) {
        return $this->paragraph('<input type="text" name="'.$name.'" placeholder="'.$placeholder.'" style="text-align:center" required>');
    }
// je crée input password
    public function inputPass($pass, $placeholder) {
        return $this->paragraph('<input type="password" name="'.$pass.'" placeholder="'.$placeholder.'" style="text-align:center" required>');
    }
// je crée un textarea
    public function textarea($name) {
      return $this->paragraph('<textarea name="'.$name.'" required></textarea>');
    }
   
// je mets un bouton submit
    public function submit() {
        return $this->paragraph('<button type="submit" name="valider" class="liens_h1" value="envoyer">Envoyer</button>');
    }
}