<?php

include_once './models/Article.php';
include_once './models/Category.php';
include_once ROOT . '/models/User.php';

class ArticlesController
{

    public function actionIndex()
    {
        $articlesList = Article::getArticlesList();

        require_once('./views/main/index.php');

        return true;
    }

    public function actionView($id)
    {
        $categories = Category::getAllCategories();

        if ($id) {

            $article = Article::getArticleByID($id);

            require_once('./views/article/article.php');
        }

        return true;
    }

    public function actionAdd()
    {
        if (User::isAuthor() || User::isAdmin()) {

            $title = false;
            $content = false;
            $category = false;
            $timestamp = false;
            $result = false;

            $categories = Category::getAllCategories();

            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                $userId = $_SESSION['user'];


                if (!empty($title) && !empty($content)) {
                    $result = Article::addArticle($title, $content, time(), $category, $userId);
                } else {
                    $error = 'All field must be filled';
                }
            }

            require_once(ROOT . '/views/article/addarticle.php');

        }

        return true;
    }

    public function actionManage()
    {
        $result = false;

        if (User::isAuthor() || User::isAdmin()) {

            $articles = Article::getArticlesByAuthor($_SESSION['user']);

            require_once(ROOT . '/views/article/manage.php');
        }

        return true;
    }

    public function actionDelete($id)
    {
        if (User::isAuthor() || User::isAdmin()) {

            $result = false;

            if ($id) {
                $result = Article::deleteArticle($id);
            }

            header('Location: '.INDEX . '/articles/manage');
        }
        return true;
    }
}
