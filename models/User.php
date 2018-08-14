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

        $sql = 'SELECT * FROM users WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login);
        $result->execute();
        $user = $result->fetch();

        if($user && password_verify($password, $user['password'])){
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

    public static function isDeactivated()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['active'] == 0) {
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

    public static function getUserName()
    {
        $userId = self::checkLogged();

        if ($userId) {
            $db = Database::getConnection();

            $sql = 'SELECT login FROM users WHERE id= ?';

            $result = $db->prepare($sql);
            $result->bindParam(1, $userId);
            $result->execute();

            return $result->fetch();
        }

    }

    public static function getAllUsers($page)
    {
        $limit = 20;
        $offset = ($page - 1) * $limit;

        $db = Database::getConnection();

        $sql = 'SELECT id, login, email, active FROM users LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();
    }

    public static function getUsersTotalCount()
    {
        $db = Database::getConnection();

        $sql = 'SELECT count(id) AS count FROM users';

        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    public static function editUser($id, $login, $email, $role)
    {

        $db = Database::getConnection();

        $sql = 'UPDATE users SET login = :login, email = :email, role = :role WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':login', $login);
        $result->bindParam(':email', $email);
        $result->bindParam(':role', $role);

        return $result->execute();
    }

    public static function deleteUser($userId)
    {

        $db = Database::getConnection();

        $sql = 'DELETE FROM users WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId);

        return $result->execute();
    }

    public static function getRoles()
    {
        $db = Database::getConnection();

        $sql = 'SHOW COLUMNS FROM users LIKE \'role\'';

        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetch();
    }

    public static function deactivateUSer($userId)
    {
        $status = false;

        $db = Database::getConnection();

        $sql = 'UPDATE users SET active = :active WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':active',$status);
        $result->bindParam(':id', $userId);

        return $result->execute();
    }

}
