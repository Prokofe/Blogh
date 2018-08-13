<?php

include_once ROOT. '/models/Article.php';
include_once ROOT . '/models/Category.php';
include_once ROOT . '/components/Pagination.php';

class MainController
{
    public function actionIndex($page = 1)
    {
        $categories = Category::getAllCategories();

        $latestArticles = Article::getAllArticles($page);

        $total = Article::getAllArticleCount();
        $pagination = new Pagination($total, $page, 20, 'page-');

        require_once ('./views/main.php');
        return true;
    }
}