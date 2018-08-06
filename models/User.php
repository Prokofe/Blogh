<?php

class User
{
    public static function register($login, $email, $password)
    {

        $db = Database::getConnection();

        $sql = 'INSERT INTO users (login, email, password) VALUES (?, ?, ?)';

        $result = $db->prepare($sql);
        $result->bindParam(1, $login);
        $result->bindParam(2, $email);
        $result->bindParam(3, $password);

        return $result->execute();
    }

    public static function checkRegisterData($login, $email, $password)
    {
        $errors = [];
        if (strlen($login) >= 6) {
        } else {
            $errors[] = 'Login must be at least 6 symbols';
        }
        if (!User::checkLoginExists($login)) {
        } else {
            $errors[] = 'This login already registered';
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        } else {
            $errors[] = 'Wrong email';
        }
        if (!User::checkEmailExists($email)) {
        } else {
            $errors[] = 'This email already registered';
        }
        if (strlen($password) >= 8) {
        } else {
            $errors[] = 'Password must be at least 8 symbols';
        }


        return $errors;
    }

    private static function checkLoginExists($login)
    {

        $db = Database::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE login = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $login);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    private static function checkEmailExists($email)
    {

        $db = Database::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $email);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkUserLoginData($login, $password)
    {
        $db = Database::getConnection();

        $sql = 'SELECT * FROM users WHERE login = ? AND password = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $login);
        $result->bindParam(2, $password);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
        return true;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function isAuthor()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role'] == 'author') {
            return true;
        }
        return false;
    }

    public static function isAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role'] == 'administrator') {
            return true;
        }
        return false;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        //header('Location: '.INDEX);
    }

    public static function getUserById($userId)
    {
        $db = Database::getConnection();

        $sql = 'SELECT * FROM users WHERE id = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $userId);
        $result->execute();

        return $result->fetch();
    }

    public static function getUserName(){
        $userId = self::checkLogged();

        if($userId){
            $db = Database::getConnection();

            $sql = 'SELECT login FROM users WHERE id= ?';

            $result = $db->prepare($sql);
            $result->bindParam(1,$userId);
            $result->execute();

            return $result->fetch();
        }

    }

}
