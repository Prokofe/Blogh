<?php

include_once ROOT . '/models/User.php';
include_once ROOT . '/models/Article.php';
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Comment.php';
include_once ROOT . '/components/Pagination.php';



class AdminController
{

    public function actionIndex()
    {
        if (User::isAdmin()) {

            $articlesCount = Article::getAllArticleCount();

            $categoriesCount = Category::getAllCategoryCount();

            $usersCount = User::getUsersTotalCount();

            $commentsCount = Comment::getAllCommentCount();

            require_once (ROOT. '/views/admin/main.php');
        }
        return true;
    }

    public function actionArticles($page = 1)
    {

        if (User::isAdmin()) {

            $articles = Article::getAllArticles($page);
            $total = Article::getAllArticleCount();

            $pagination = new Pagination($total, $page, 20, 'page-');

            require_once(ROOT . '/views/admin/articles/articles.php');
        }
        return true;
    }

    public function actionCategories()
    {

        if (User::isAdmin()) {

            $categories = Category::getAllCategories();

            require_once(ROOT . '/views/admin/categories/categories.php');
        }

        return true;
    }

    public function actionUsers($page = 1)
    {

        if (User::isAdmin()) {

            $users = User::getAllUsers($page);

            $total = User::getUsersTotalCount();

            $pagination = new Pagination($total, $page, 20, 'page-');

            require_once(ROOT . '/views/admin/users/main.php');
        }

        return true;
    }




}