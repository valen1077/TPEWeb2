<?php
    require_once './app/controller/libro.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'home'; // acción por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $controller = new LibroController();
            $controller->showBooks();
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
        default:
            $controller = new LibroController();
            $controller->showError("Parece que tenemos un error 404.");
            break;
    }
