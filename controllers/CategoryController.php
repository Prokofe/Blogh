<?php

include_once './models/Article.php';
include_once './models/Category.php';
include_once ROOT.'/models/User.php';

class CategoryController
{

    public function actionCategory($categoryId)
    {

        $categories = Category::getAllCategories();

        $latestArticles = Article::getArticlesByCategory($categoryId);

        require_once('./views/category/index.php');
        return true;
    }
}