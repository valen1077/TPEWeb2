<?php
    require './app/model/user.model.php';
    require './app/view/auth.view.php';

    class AuthController{
        private $model;
        private $view;

        public function __construct(){
            $this->model = new UserModel();
            $this->view = new AuthView();
        }

        public function showLogin($res){
            $this->view->showLogin('',$res);
        }

        public function login($res){
            if(!isset($_POST['email']) || empty($_POST['email'])){
                return $this->view->showLogin('Falta completar el e-mail',$res);
            }

            $mail = $_POST['email'];
            $pass = $_POST['password'];
            $user = $this->model->gerUserByMail($mail);

            if( password_verify($pass,$user->password) ){
                session_start();
                $_SESSION['email'] = $user ->mail;
                $_SESSION['id'] = $user ->id;
                header('Location: ' . BASE_URL);
            }
            else{
                return $this->view->showLogin("Credenciales incorrectas, por favor verifique los datos y vuelva a intentarlo.",$res);
            }
            header('Location: ' . BASE_URL);
        }

        public function logout(){
            session_start();
            session_destroy();
            header('Location: ' . BASE_URL);
        }

        public function signIn($res){
            if(!isset($_POST['mail']) || empty($_POST['mail'])){
                return $this->view->showSignUp("Falta completar el e-mail",$res);
            }

            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            $hash = password_hash($pass, PASSWORD_DEFAULT);

        }


    }