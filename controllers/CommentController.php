<?php

include_once ROOT . '/models/User.php';
include_once ROOT . '/models/Comment.php';


class CommentController
{
    public function actionAdd()
    {
        if (!User::isGuest()) {

            $comment = false;

            if (isset($_POST['submit'])) {
                $comment = $_POST['comment'];
                $articleId = $_POST['article_id'];
                $userId = User::checkLogged();

                if (!empty($comment)) {
                    $result = Comment::addComment($comment, $articleId, $userId);
                } else {
                    $error = 'Comment area is empty';
                }
            }
            header('Location: ' . INDEX . '/article/' . $articleId);
        }
        return true;
    }

    public function actionDelete($articleId, $commentId)
    {
        if (User::isAdmin()) {

            if ($commentId) {
                $result = Comment::deleteComment($commentId);
            }
            header('Location: ' . INDEX . '/article/' . $articleId);
        }
        return true;
    }
}