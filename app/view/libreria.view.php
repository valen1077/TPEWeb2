<?php
class LibreriaView {
    private $user = null;

    public function __construct() {
        $this->user = null;
    }

    public function showLibraries($librerias) {
        require './templates/lista_librerias.phtml';
    }

    public function addLibrary() {
        require './templates/addLibrary.phtml';
    }

    public function showError($error) {
        require './templates/libreria_error.phtml';
    }

    // Mostrar formulario de modificación de librería
    public function modifyLibrary($libreria) {
        require './templates/libreria_modify.phtml';
    }
}
