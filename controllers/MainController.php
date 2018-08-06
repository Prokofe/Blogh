<?php

include_once ROOT. '/models/Article.php';
include_once ROOT . '/models/Category.php';

class MainController
{
    public function actionIndex()
    {
        $categories = Category::getAllCategories();

        $latestArticles = Article::getLatestArticles();

        require_once ('./views/index.php');
        return true;
    }
}