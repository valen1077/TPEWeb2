<?php
require './app/middlewares/user.php';
    class Response{
        private $user = null;

        public function __construct(){
            $this->user = new User();
        }
        
        public function getUser(){
            return $this->user;
        }
    }