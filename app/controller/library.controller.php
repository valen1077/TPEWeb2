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


    public function getLibraries(){
        return $this->model->getLibraries(); 
    }
    // Mostrar todas las librerías
    public function showLibraries($res) {
        $librerias = $this->model->getLibraries(); 
        $this->view->showLibraries($librerias,$res); 
    }

    // Agregar una nueva librería
    public function addLibrary($res) {
        if(!empty($res)){
            if (!empty($_POST['nombre']) && !empty($_POST['direccion'])) {
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $this->model->insertLibrary($nombre, $direccion);
                header("Location: librerias"); 
            } 
        }else {
            $this->view->showError("Error: Todos los campos son obligatorios.",$res); 
        }
    }

    // Mostrar el formulario de agregar librería
    public function showAddLibraryForm($res) {
        $this->view->addLibrary($res); 
    }

    // Mostrar la vista de modificar una librería
    public function modifyLibrary($id,$res) {
        $libreria = $this->model->getLibrary($id); 
        if ($libreria) {
            $this->view->modifyLibrary($libreria,$res); 
        } else {
            $this->view->showError("Librería no encontrada.",$res);
        }
    }

    // Ejecutar modificación de una librería
    public function updateLibrary($res) {
        if (!empty($_POST['id_libreria']) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {
            $id = $_POST['id_libreria'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $this->model->updateLibrary($id, $nombre, $direccion); 
            header("Location: librerias"); 
        } else {
            $this->view->showError("Error: Todos los campos son obligatorios.",$res); 
        }
    }

    // Eliminar una librería
    public function deleteLibrary($id, $res) {
        if (!empty($id) && is_numeric($id)) { 
            if ($this->model->deleteLibrary($id)) {
                header("Location: librerias"); 
                exit(); 
            } else {
                $this->view->showError("Error al eliminar la librería. Puede que no exista o ya haya sido eliminada.",$res);
            }
        } else {
            $this->view->showError("Libreria eliminada.", $res);
        }
    }
}
