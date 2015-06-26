<?php

abstract class BaseController {
    protected $action;
    protected $controller;

    public function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
        $this->onInit();
    }

    public function onInit() {
    }

    public function index() {
    }

    public function renderView($viewName = null, $controller = null) {
        if ($viewName == null) {
            $viewName = $this->action;
        }
        include_once('views/layouts/header.php');
        include_once('views/' . $this->controller . '/' . $this->action . '.php');
        include_once('views/layouts/footer.php');
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    protected function redirect($controller = null, $action = null, $params = []) {
        if ($controller == null) {
            $controller = $this->controller;
        }
        $url = "/$controller/$action";
        $paramsUrlEncoded = array_map('urlencode', $params);
        $paramsJoined = implode('/', $paramsUrlEncoded);
        if ($paramsJoined != '') {
            $url .= '/' . $paramsJoined;
        }

        $this->redirectToUrl($url);
    }

    protected function redirectToUrl($url) {
        header("Location: $url");
        die;
    }
}