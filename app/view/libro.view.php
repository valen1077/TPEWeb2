<?php
    class LibroView{
        private $user = null;

        public function _construct(){
            $this->user = null;
        } 
       

        public function showBooks($librerias,$libros,$res){
            require './templates/lista_libros.phtml';
        }

        public function showBook($libro,$res,$libreria){
            require './templates/libro.phtml';
        }
        
        public function addBook(){
            require './templates/addBook.phtml';
        }

        public function modifyBook($librerias,$libro,$res){
            require './templates/libro_modify.phtml';
        }

        public function showError($error){
            require './templates/libro_error.phtml';
        }

    }