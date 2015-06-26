<?php

class AccountController extends BaseController {
    protected $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function index() {
        $this->renderView('login');
    }

    public function login() {
        if ($this->isPost()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);

            if ($isLoggedIn) {
                $_SESSION['username'] = $username;
                $this->redirectToUrl('/');
            } else {
                die ('Can not login user');
            }
        }
    }

    public function register() {
        if ($this->isPost()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isRegister = $this->db->register($username, $password);

            if ($isRegister) {
                $_SESSION['username'] = $username;
                $this->redirectToUrl('/');
            } else {
                die ('Can not register user');
            }
        }
    }

    public function logout() {
        unset($_SESSION['username']);
        $this->redirectToUrl('/');
    }

    public function isValidUser() {
        return $_POST['username'] != null || $_POST['password'] != null || strlen($_POST['username']) > 5 ||
        strlen($_POST['password']) > 5;
    }
}