<?php

include_once('includes/config.php');

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestParts = explode('/', $requestPath);

//Get Controller and Action Name
$controllerName = DEFAULT_CONTROLLER;
$actionName = DEFAULT_ACTION;
if (count($requestParts) >= 2 && $requestParts[1] != '') {
    $controllerName = strtolower($requestParts[1]);
    if (! preg_match('/^[a-zA-Z0-9_]+$/', $controllerName)) {
        die('Invalid controller name ' . $controllerName . '.');
    }

    if (count($requestParts) >= 3 && $requestParts[2] != '') {
        $actionName = $requestParts[2];
        if (! preg_match('/^[a-zA-Z0-9_]+$/', $actionName)) {
            die('Invalid action name ' . $actionName . '.');
        }
    }
}

$params = [];
if (count($requestParts) >= 4) {
    $params = array_splice($requestParts, 3);
}

$controllerClassName = ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName($controllerName, $actionName, $params);
    if (method_exists($controller, $actionName)) {
        // Call $controller->$action($params)
        call_user_func_array(array($controller, $actionName), $params);
        $controller->renderView();
    } else {
        die ('Error: cannot find action "' . $actionName . '" in controller ' . $controllerClassName);
    }
} else {
    $controllerFileName = 'controllers/' . $controllerClassName . '.php';
    die ('Error: cannot find controller: ' . $controllerFileName);
}

function __autoload($class_name) {
    if (file_exists("controllers/$class_name.php")) {
        include "controllers/$class_name.php";
    }
    if (file_exists("models/$class_name.php")) {
        include "models/$class_name.php";
    }
}