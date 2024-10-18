<?php
    function sessionAuthMiddlewares($response){
        if(empty( $response->getUser()->getId() ) && empty( $response->getUser()->getEmail() )){
            header('Location: ' . BASE_URL . 'showlogin');
        }
        return $response->getUser();
    }
