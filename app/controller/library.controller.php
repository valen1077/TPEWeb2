<?php
require './app/model/library.model.php'; 
require './app/view/libreria.view.php'; 

class LibreriaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new LibreriaModel(); 
        $this->view = new LibreriaView();
    }

    // Mostrar todas las librerías
    public function showLibraries() {
        $librerias = $this->model->getLibraries(); 
        $this->view->showLibraries($librerias); 
    }

    // Agregar una nueva librería
    public function addLibrary() {
        if (!empty($_POST['nombre']) && !empty($_POST['direccion'])) {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $this->model->insertLibrary($nombre, $direccion);
            header("Location: librerias"); 
        } else {
            $this->view->showError("Error: Todos los campos son obligatorios."); 
        }
    }

    // Mostrar el formulario de agregar librería
    public function showAddLibraryForm() {
        $this->view->addLibrary(); 
    }

    // Mostrar la vista de modificar una librería
    public function modifyLibrary($id) {
        $libreria = $this->model->getLibrary($id); 
        if ($libreria) {
            $this->view->modifyLibrary($libreria); 
        } else {
            $this->view->showError("Librería no encontrada.");
        }
    }

    // Ejecutar modificación de una librería
    public function updateLibrary() {
        if (!empty($_POST['id_libreria']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {
            $id = $_POST['id_libreria'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $this->model->updateLibrary($id, $nombre, $direccion); 
            header("Location: librerias"); 
        } else {
            $this->view->showError("Error: Todos los campos son obligatorios."); 
        }
    }

    // Eliminar una librería
    public function deleteLibrary($id) {
        if (!empty($id) && is_numeric($id)) { 
            if ($this->model->deleteLibrary($id)) {
                header("Location: librerias"); 
                exit(); 
            } else {
                $this->view->showError("Error al eliminar la librería. Puede que no exista o ya haya sido eliminada.");
            }
        } else {
            $this->view->showError("Libreria eliminada.");
        }
    }

    // Mostrar la vista de error
    public function showError($error) {
        $this->view->showError($error); 
    }
}
