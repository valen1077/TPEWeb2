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

    public function modifyLibrary($libreria, $res) {
        require './templates/libreria_modify.phtml';
    }

    public function showBooksByLibrary($libros, $libreria, $res) {
        require './templates/lista_libros_libreria.phtml';
    }
}
