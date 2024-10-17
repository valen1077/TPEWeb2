<?php
require './app/model/library.model.php'; 
require './app/view/libreria.view.php'; 

class LibreriaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new LibreriaModel(); // Asegúrate de tener el modelo correctamente inicializado
        $this->view = new LibreriaView();
    }

    // Mostrar todas las librerías
    public function showLibraries() {
        $librerias = $this->model->getLibraries(); // Obtener librerías del modelo
        $this->view->showLibraries($librerias); // Pasar las librerías a la vista
    }

    // Agregar una nueva librería
    public function addLibrary() {
        if (!empty($_POST['nombre']) && !empty($_POST['direccion'])) {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $this->model->insertLibrary($nombre, $direccion);
            header("Location: librerias"); // Redirigir a la lista de librerías después de agregar
        } else {
            $this->view->showError("Error: Todos los campos son obligatorios."); // Mostrar error en la vista
        }
    }

    // Mostrar el formulario de agregar librería
    public function showAddLibraryForm() {
        $this->view->addLibrary(); // Mostrar la vista del formulario de agregar librería
    }

    // Modificar una librería
    public function modifyLibrary($id) {
        $libreria = $this->model->getLibrary($id); // Obtener la librería por ID
        if ($libreria) {
            $this->view->modifyLibrary($libreria); // Mostrar la vista para modificar la librería
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
            $this->model->updateLibrary($id, $nombre, $direccion); // Llamar al modelo para actualizar
            header("Location: librerias"); // Redirigir después de modificar
        } else {
            $this->view->showError("Error: Todos los campos son obligatorios."); // Mostrar error en la vista
        }
    }

    // Eliminar una librería
    public function deleteLibrary($id) {
        if (!empty($id) && is_numeric($id)) { // Verificación de ID
            if ($this->model->deleteLibrary($id)) {
                header("Location: librerias"); // Redirigir después de eliminar
                exit(); // Asegúrate de salir después de redirigir
            } else {
                $this->view->showError("Error al eliminar la librería. Puede que no exista o ya haya sido eliminada.");
            }
        } else {
            $this->view->showError("Se elimino la libreria.");
        }
    }

    // Mostrar la vista de error
    public function showError($error) {
        $this->view->showError($error); // Mostrar error
    }
}
