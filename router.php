<?php
    require_once './app/controller/libro.controller.php';
    require_once './app/controller/auth.controller.php';
    require_once './app/controller/library.controller.php';
    require_once './libs/response.php';
    require_once './app/middlewares/session.auth.middlewares.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $res = new Response();
    $action = 'home'; // acción por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $controller = new LibroController();
            $controlerLibrery = new LibreriaController();
            $librerias= $controlerLibrery->getLibraries();
            $controller->showBooks($librerias,$res);
            break;
        case 'showlogin':
            if(!$res->getUser()->getId()){
                $controller = new AuthController();
                $controller->showLogin($res);
            }else{
                header('Location: ' . BASE_URL);
            }
            break;
        case 'login':
            if(!$res->getUser()->getId()){
                $controller = new AuthController();
                $controller->login($res);
            }else{
                header('Location: ' . BASE_URL);
            }
            break;
        case 'logout':
            $controller = new AuthController($res);
            $controller->logout();
            break;
        case 'infoBook':
            $controller = new LibroController();
            $libro = $controller->showBookByid($params[1]);
            $controller2 = new LibreriaController();
            $libreria = $controller2->getLibrary($libro->id_libreria);
            $nameLib = $libreria->nombre;
            $controller->showBook($params[1],$res,$nameLib);
            break;
        case 'delete':
            sessionAuthMiddlewares($res);
            $controller = new LibroController();
            $controller->deleteBook($params[1]);
            break;
        case 'addBook':
            sessionAuthMiddlewares($res);
            $controller = new LibroController();
            $controller->addBook();
            break;
        case 'modifyBook':
            sessionAuthMiddlewares($res);
            $controller = new LibroController();
            $controlerLibrery = new LibreriaController();
            $librerias= $controlerLibrery->getLibraries();
            $controller->viewModify($librerias,$params[1],$res);
            break;
        case 'modifyOK':
            sessionAuthMiddlewares($res);
            $controller = new LibroController();
            $controller->modifyBook();
            break;
        case 'hash':
            echo password_hash("admin",PASSWORD_DEFAULT);
            break;
        case 'librerias':
            $controller = new LibreriaController();
            $controller->showLibraries($res);
            break;
        case 'addLibrary':
            sessionAuthMiddlewares($res);
            $controller = new LibreriaController();
            $controller->addLibrary($res);
            break;
        case 'addLibraryForm':
            sessionAuthMiddlewares($res);
            $controller = new LibreriaController();
            $controller->showAddLibraryForm($res);
            break;
        
        case 'modifyLibrary':
            sessionAuthMiddlewares($res);
            $controller = new LibreriaController();
            $controller->modifyLibrary($params[1],$res);
            break;
    
        case 'modifyLibraryOK':
            sessionAuthMiddlewares($res);
            $controller = new LibreriaController();
            $controller->updateLibrary($res);
            break;
    
        case 'deleteLibrary':
            sessionAuthMiddlewares($res);
            $controller = new LibreriaController();
            $controller->deleteLibrary($params[1],$res);
            break;
        case 'infoLibrary':
            $controller = new LibreriaController();
            $controller->showBooksByLibrary($params[1], $res);
            break;    
        default:
            $controller = new LibroController();
            $controller->showError("Parece que tenemos un error 404.");
            break;
    }
