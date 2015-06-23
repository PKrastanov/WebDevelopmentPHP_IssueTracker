<?php

abstract class BaseController {
    protected $action;
    protected $controller;

    public function index() {
    }

    public function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
    }

    public function renderView($viewName = null, $controller = null) {
        if ($viewName == null) {
            $viewName = $this->action;
        }
        include_once('views/layouts/header.php');
        include_once('views/' . $this->controller . '/' . $this->action . '.php');
        include_once('views/layouts/footer.php');
    }
}