<?php


class Comment
{
    public static function getCommentsByArticleId($articleId)
    {

        $db = Database::getConnection();

        $sql = 'SELECT comments.id, comments.comment, comments.article_id, comments.user_id, users.login FROM comments 
                INNER JOIN users ON comments.user_id = users.id WHERE comments.article_id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $articleId);
        $result->execute();

        return $result->fetchAll();
    }

    public static function addComment($comment, $article_id, $user_id)
    {
        $db = Database::getConnection();

        $sql = 'INSERT INTO comments (comment, article_id, user_id) VALUES (:comment, :article_id, :user_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':comment', $comment);
        $result->bindParam(':article_id', $article_id);
        $result->bindParam(':user_id', $user_id);

        return $result->execute();
    }

    public static function deleteComment($commentId)
    {
        $db = Database::getConnection();

        $sql = 'DELETE FROM comments WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id',$commentId);

        return $result->execute();
    }

    public static function getAllCommentCount()
    {
        $db = Database::getConnection();

        $sql = 'SELECT count(id) AS count FROM comments';

        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }
}