<?php



class MainController
{
    public function actionIndex($page = 1)
    {
        $categories = Category::getAllCategories();

        $latestArticles = Article::getAllArticles($page);

        $total = Article::getAllArticleCount();
        $pagination = new Pagination($total, $page, 20, 'page-');

        require_once (ROOT . '/views/main.php');
        return true;
    }
}