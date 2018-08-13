<?php

class Article
{
    const ARTICLES_PER_PAGE_CATEGORY = 15;
    const ARTICLES_PER_PAGE_MAIN = 20;

    public static function getArticleByID($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Database::getConnection();

            $sql = 'SELECT articles.id, articles.title, articles.timestamp, articles.user_id, articles.category_id, articles.content, users.login 
                    FROM articles INNER JOIN users ON articles.user_id = users.id WHERE articles.id= ?';
            $result = $db->prepare($sql);
            $result->bindParam(1, $id);
            $result->execute();

            return $result->fetch();;
        }
    }

    public static function getAllArticles($page)
    {

        $limit = self::ARTICLES_PER_PAGE_MAIN;
        $offset = ($page - 1) * $limit;

        $db = Database::getConnection();

        $sql = 'SELECT articles.id, articles.title, articles.timestamp, articles.user_id, users.login FROM articles 
                INNER JOIN users ON articles.user_id = users.id ORDER BY timestamp DESC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll();

    }

    public static function getArticlesByCategory($categoryId, $page)
    {

        $limit = self::ARTICLES_PER_PAGE_CATEGORY;
        $offset = ($page - 1) * $limit;

        $db = Database::getConnection();

        $sql = 'SELECT articles.id, articles.title, articles.timestamp, articles.user_id, users.login FROM articles 
                INNER JOIN users ON articles.user_id = users.id WHERE articles.category_id= :id ORDER BY timestamp DESC LIMIT :limit OFFSET :offset';


        $result = $db->prepare($sql);
        $result->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
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


    public static function getArticlesByAuthor($userId)
    {

        $db = Database::getConnection();

        $sql = 'SELECT id, title, timestamp, user_id FROM articles WHERE user_id= ? ORDER BY timestamp DESC';

        $result = $db->prepare($sql);
        $result->bindParam(1, $userId);
        $result->execute();

        return $result->fetchAll();
    }

    public static function deleteArticle($id)
    {

        $db = Database::getConnection();

        $sql = 'DELETE FROM articles WHERE id = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $id);

        return $result->execute();
    }

    public static function editArticle($id, $title, $content, $categoryId)
    {

        $db = Database::getConnection();

        $sql = 'UPDATE articles SET title = ?, content = ?, category_id= ? WHERE id = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $title);
        $result->bindParam(2, $content);
        $result->bindParam(3, $categoryId);
        $result->bindParam(4, $id);

        return $result->execute();
    }

    public static function getArticleCountByCategory($categoryId)
    {
        $db = Database::getConnection();

        $sql = 'SELECT count(id) AS count FROM articles WHERE category_id = ?';

        $result = $db->prepare($sql);
        $result->bindParam(1, $categoryId, PDO::PARAM_INT);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    public static function getAllArticleCount()
    {
        $db = Database::getConnection();

        $sql = 'SELECT count(id) AS count FROM articles';

        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

}
