<?php
    class AuthView{
        private $user;

        public function _construct(){
            $this->user = null;
        } 

        public function showLogin($error = '',$res){
            require './templates/login.phtml';
        }

        public function showSignUp($error = '',$res){
            require './templates/login.phtml';
        }

        
    }