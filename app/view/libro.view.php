<?php
    class LibroView{
        private $user = null;

        public function _construct(){
            $this->user = null;
        } 
       

        public function showBooks($libros){
            require './templates/lista_libros.phtml';
        }

        public function showBook($libro){
            require './templates/libro.phtml';
        }

        public function showError($error){
            require './templates/libro_error.phtml';
        }

        public function showLogin(){
            require './templates/login.phtml';
        }
    }