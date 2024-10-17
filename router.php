<?php
require_once './app/controller/libro.controller.php';
require_once './app/controller/library.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($params[0]){
    case 'home':
        $controller = new LibroController();
        $librerias = $controller->librerias();
        $controller->showBooks($librerias);
        break;
    case 'login':
        $controller = new LibroController();
        $controller->showLogin();
        break;
    case 'infoBook':
        $controller = new LibroController();
        $controller->showBook($params[1]);
        break;
    case 'delete':
        $controller = new LibroController();
        $controller->deleteBook($params[1]);
        break;
    case 'addBook':
        $controller = new LibroController();
        $controller->addBook();
        break;
    case 'modifyBook':
        $controller = new LibroController();
        $librerias = $controller->librerias();
        $controller->viewModify($librerias, $params[1]);
        break;
    case 'modifyOK':
        $controller = new LibroController();
        $controller->modifyBook();
        break;
    case 'librerias':
        $controller = new LibreriaController();
        $controller->showLibraries();
        break;
    case 'addLibrary':
        $controller = new LibreriaController();
        $controller->addLibrary();
        break;
    case 'addLibraryForm':
        $controller = new LibreriaController();
        $controller->showAddLibraryForm();
        break;
    
    // Nueva ruta para mostrar el formulario de modificar una librería
    case 'modifyLibrary':
        $controller = new LibreriaController();
        $controller->modifyLibrary($params[1]); // Cambiar a modifyLibrary()
        break;

    // Nueva ruta para procesar la modificación de la librería
    case 'modifyLibraryOK':
        $controller = new LibreriaController();
        $controller->updateLibrary(); // Cambiar a updateLibrary()
        break;

    case 'deleteLibrary':
        $controller = new LibreriaController();
        $controller->deleteLibrary($params[1]);
        break;
    
    default:
        $controller = new LibroController();
        $controller->showError("Parece que tenemos un error 404.");
        break;
}
