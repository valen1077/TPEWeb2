<?php
    require './app/model/libro.model.php';
    require './app/view/libro.view.php';
    class LibroController{
        private $model;
        private $view;

        public function __construct(){
            $this->model = new LibroModel();
            $this->view = new LibroView();
        }

        public function showBooks(){
            $libros = $this->model->getBooks();
            $this->view->showBooks($libros);
        }

        public function showBook($id){
            $libro = $this->model->getBook($id);
            $this->view->showBook($libro);
        }

        public function showError($error){
            $this->view->showError($error);
        }

        public function deleteBook($id){
            $this->model->deleteBook($id);
            $this->view->showError("Libro eliminado con extio.");
        }

        public function addBook(){
            if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
                return $this->view->showError("Falta completar el nombre");
            }
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $editorial = $_POST['editorial'];
            $id_libreria = $_POST['id_libreria'];
            $this->model->addBook($nombre,$genero,$editorial,$id_libreria);
            header("Location ". BASE_URL);
        }

        public function modifyBook(){
            if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
                return $this->view->showError("Falta completar el nombre");
            }
        }

        public function showLogin(){
            return $this->view->showLogin();
        }

    }