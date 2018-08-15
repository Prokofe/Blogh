<?php

/**
 * Class AdminController provide admin controllers
 */
class AdminController
{

    /**
     * main page in admin category with statistics
     * @return bool
     */
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

    /**
     * list of all articles with pagination
     * @param int $page
     * @return bool
     */
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

    /**
     * list of categories
     * @return bool
     */
    public function actionCategories()
    {

        if (User::isAdmin()) {

            $categories = Category::getAllCategories();

            require_once(ROOT . '/views/admin/categories/categories.php');
        }

        return true;
    }

    /**
     * list of all users with pagination
     * @param int $page
     * @return bool
     */
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