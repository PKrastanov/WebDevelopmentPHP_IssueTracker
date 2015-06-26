<?php

class AccountController extends BaseController {
    protected $db;
    protected $validateToken;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function index() {
        $this->renderView('login');
    }

    public function login() {
        if ($this->isPost() && $this->isValidUsernameAndPassword()) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $isLoggedIn = $this->db->login($username, $password);

            if ($isLoggedIn) {
                $_SESSION['username'] = $username;
                $this->addInfoNotification($username . ' login successfully.');
                $this->redirectToUrl('/');
            } else {
                $this->addErrorNotification('Login failed please try again.');
            }
        }
    }

    public function register() {
        if ($this->isPost() && $this->isValidUsernameAndPassword()) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $isRegister = $this->db->register($username, $password);

            if ($isRegister) {
                $_SESSION['username'] = $username;
                $this->addInfoNotification($username . ' register successfully.');
                $this->redirectToUrl('/');
            } else {
                $this->addErrorNotification('Registration failed please try again.');
            }
        }
    }

    public function logout() {
        $this->addInfoNotification($_SESSION['username'] . ' logout successfully.');
        unset($_SESSION['username']);
        $this->redirectToUrl('/');
    }

    public function isValidUsernameAndPassword() {
        return $_POST['username'] != null && $_POST['password'] != null &&
            strlen($_POST['username']) > 5 && strlen($_POST['password']) > 5;
    }

    public function generateToken() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 50; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}