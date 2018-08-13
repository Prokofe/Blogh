<?php

include_once ROOT . '/models/Article.php';
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/User.php';
include_once ROOT . '/components/Pagination.php';

class CategoryController
{

    public function actionCategory($categoryId, $page = 1)
    {

        $categories = Category::getAllCategories();

        foreach ($categories as $category) {
            if ($category['id'] == $categoryId) {
                $latestArticles = Article::getArticlesByCategory($categoryId, $page);

                $total = Article::getArticleCountByCategory($categoryId);
                $pagination = new Pagination($total, $page, 15, 'page-');

                require_once('./views/category/category.php');
                return true;
            }
        }
        require_once('./views/404.php');
    }

    public function actionEdit($id)
    {
        if (User::isAdmin()) {
            $result = false;

            if ($id) {

                $category = Category::getCategoryById($id);

                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];

                    if (!empty($name)) {
                        $result = Category::editCategory($id, $name);
                    } else {
                        $error = 'All field must be filled';
                    }
                }
            }
            require_once(ROOT . '/views/admin/categories/edit.php');
        }
        return true;
    }

    public function actionAdd()
    {
        if (User::isAdmin()) {

            $name = false;
            $result = false;

            $categories = Category::getAllCategories();

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];

                if (!empty($name)) {
                    $result = Category::addCategory($name);
                } else {
                    $error = 'All field must be filled';
                }
            }

            require_once(ROOT . '/views/admin/categories/add.php');

        }

        return true;
    }

    public function actionDelete($id)
    {
        if (User::isAdmin()) {

            $result = false;

            if ($id) {
                $result = Category::deleteCategory($id);
            }

            header('Location: ' . INDEX . '/admin/categories');
        }
        return true;
    }
}