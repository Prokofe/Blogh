<?php


class UserController
{
    public function actionRegister()
    {

        $login = false;
        $email = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $errors = User::checkRegisterData($login, $email, $password);
            if (empty($errors)) {
                $result = User::register($login, $email, password_hash($password, PASSWORD_DEFAULT));
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    public function actionLogin()
    {
        $login = false;
        $password = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $userId = User::checkUserLoginData($login, $password);

            if ($userId == false) {
                $errors[] = 'Wrong login or password';
            } else {
                $result = User::auth($userId);
                header('Location: ' . INDEX);
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: ' . INDEX);
    }

    public function actionEdit($id)
    {
        if (User::isAdmin()) {

            if ($id) {

                $login = false;
                $email = false;
                $role = false;
                $result = false;

                $user = User::getUserById($id);

                if (isset($_POST['submit'])) {
                    $login = $_POST['login'];
                    $email = $_POST['email'];
                    $role = $_POST['role'];

                    if (!empty($login) && !empty($email) && !empty($role)) {
                        $result = User::editUser($id, $login, $email, $role);
                    } else {
                        $error = 'All fields must be filled';
                    }
                }

            }
            require_once(ROOT . '/views/admin/users/edit.php');
        }
        return true;
    }

    public function actionDeactivate($id)
    {
        if (User::isAdmin()) {

            if ($id) {
                $result = User::deactivateUSer($id);
            }

            header('Location: ' . INDEX . '/admin/users');
        }
        return true;
    }
}