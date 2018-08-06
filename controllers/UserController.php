<?php

include_once ROOT . '/models/User.php';

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
                $result = User::register($login, $email, md5($password));
            }
        }

        require_once('./views/user/register.php');
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

            $userId = User::checkUserLoginData($login, md5($password));

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
}