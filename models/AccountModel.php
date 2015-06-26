<?php

class AccountModel extends BaseModel {

    public function register($username, $password) {
        $statement = self::$db->prepare("SELECT COUNT(Id) FROM Users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $isRegister = $statement->get_result()->fetch_assoc();

        if ($isRegister['COUNT(Id)']) {
            return false;
        }

        $pass_hash = password_hash($password, PASSWORD_BCRYPT);

        $registerStatement = self::$db->prepare("INSERT INTO Users (username, pass_hash) VALUES (?, ?)");
        $registerStatement->bind_param("ss", $username, $pass_hash);
        $registerStatement->execute();

        return true;
    }

    public function login($username, $password) {
        $statement = self::$db->prepare("SELECT Id, username, pass_hash FROM Users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $registered = $statement->get_result()->fetch_assoc();

        var_dump(password_verify($password, $registered['pass_hash']));

        if (password_verify($password, $registered['pass_hash'])) {
            return true;
        }

        return false;
    }
}