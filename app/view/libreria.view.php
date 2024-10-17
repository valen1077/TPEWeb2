<?php
class LibreriaView {
    private $user = null;

    public function _construct() {
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
}