<?php
class LibreriaView {
    private $user = null;

    public function __construct() {
        $this->user = null;
    }

    public function showLibraries($librerias,$res) {
        require './templates/lista_librerias.phtml';
    }

    public function addLibrary($res) {
        require './templates/addLibrary.phtml';
    }

    public function showError($error, $res) {
        require './templates/libreria_error.phtml';
    }

    // Mostrar formulario de modificación de librería
    public function modifyLibrary($libreria, $res) {
        require './templates/libreria_modify.phtml';
    }
}
