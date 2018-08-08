<?php

include_once ROOT . '/models/Article.php';
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/User.php';

class CategoryController
{

    public function actionCategory($categoryId)
    {

        $categories = Category::getAllCategories();

        foreach ($categories as $category) {
            if ($category['id'] == $categoryId) {
                $latestArticles = Article::getArticlesByCategory($categoryId);

                require_once('./views/category/category.php');
                return true;
            }
        }
        require_once('./views/404.php');
    }
}