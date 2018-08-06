<?php

class Article
{

    public static function getArticleByID($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Database::getConnection();

            $sql = 'SELECT articles.id, articles.title, articles.timestamp, articles.user_id, articles.content, users.login 
                    FROM articles INNER JOIN users ON articles.user_id = users.id WHERE articles.id= ?';
            $result = $db->prepare($sql);
            $result->bindParam(1, $id);
            $result->execute();

            return $result->fetch();;
        }
    }

    public static function getLatestArticles()
    {

        $db = Database::getConnection();

        $sql = 'SELECT articles.id, articles.title, articles.timestamp, articles.user_id, users.login FROM articles 
                INNER JOIN users ON articles.user_id = users.id ORDER BY timestamp DESC';

        $result = $db->prepare($sql);
        //$result->bindParam(1, $count);
        $result->execute();

        return $result->fetchAll();

    }

    public static function getArticlesByCategory($category_id)
    {

        $db = Database::getConnection();

        $sql = 'SELECT articles.id, articles.title, articles.timestamp, articles.user_id, users.login FROM articles 
                INNER JOIN users ON articles.user_id = users.id WHERE articles.category_id= ? ORDER BY timestamp DESC';

        $result = $db->prepare($sql);
        $result->bindParam(1, $category_id);
        $result->execute();

        return $result->fetchAll();
    }

    public static function getArticlesList()
    {

        $db = Database::getConnection();

        $sql = 'SELECT * FROM articles ORDER BY timestamp DESC';

        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll();
    }

    public static function addArticle($title, $content, $timestamp, $categoryId, $userId)
    {
        $db = Database::getConnection();

        $sql = 'INSERT INTO articles (title, content, timestamp, category_id, user_id) VALUES (?, ?, ?, ?, ?)';

        $result = $db->prepare($sql);
        $result->bindParam(1, $title);
        $result->bindParam(2, $content);
        $result->bindParam(3, $timestamp);
        $result->bindParam(4, $categoryId);
        $result->bindParam(5, $userId);

        return $result->execute();
    }

    public static function getArticlesByAuthor($userId) {

        $db = Database::getConnection();

        $sql = 'SELECT id, title, timestamp, user_id FROM articles WHERE user_id= ? ORDER BY timestamp DESC';

        $result = $db->prepare($sql);
        $result->bindParam(1,$userId);
        $result->execute();

        return $result->fetchAll();
    }

    public static function deleteArticle($id) {

        $db = Database::getConnection();

        $sql = 'DELETE FROM articles WHERE id = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $id);

        return $result->execute();
    }

}
