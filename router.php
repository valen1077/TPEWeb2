<?php
    require_once './app/model/model.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'home'; // acción por defecto
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $model = new Model();
            break;         
        default:
            //
            break;    
    }
