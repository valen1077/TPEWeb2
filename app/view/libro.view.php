<?php
    class LibroView{
        private $user = null;

        public function _construct(){
            $this->user = null;
        } 
       

        public function showBooks($librerias,$libros){
            require './templates/lista_libros.phtml';
        }

        public function showBook($libro){
            require './templates/libro.phtml';
        }
        
        public function addBook(){
            require './templates/addBook.phtml';
        }

        public function modifyBook($librerias,$libro){
            require './templates/libro_modify.phtml';
        }

        public function showError($error){
            require './templates/libro_error.phtml';
        }

        public function showLogin(){
            require './templates/login.phtml';
        }

    }