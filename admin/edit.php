<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');


if (isset($_SESSION['logged_in'])) {

    $article = new Article;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //$article->fetch_data($id);
        $currentArticle = $article->fetch_data($id);
    }
    if (isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if (empty($title) || empty($content)) {
            $error = 'All fields required!';
        } else {
            $query = $pdo->prepare('UPDATE articles SET article_title = ?, article_content = ? WHERE article_id = ?');

            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, $id);

            $query->execute();

            header('Location: index.php');
        }
    }
    ?>
    <html>
    <head>
        <title>Blogh - Admin</title>
        <link rel="stylesheet" href="../assets/style.css"/>
    </head>

    <body>
    <div class="container">
        <a href="index.php" id="logo">Blogh - Admin</a>
        <br>
        <div class="content">
            <h4>Edit text</h4>
            <br><br>
            <form action="edit.php?id=<?php echo $id ?>" method="post" autocomplete="off">
                <input type="text" name="title" value="<?php echo $currentArticle['article_title']; ?>"/><br><br>
                <textarea rows="15" cols="50"
                          name="content"><?php echo $currentArticle['article_content']; ?></textarea><br><br>
                <input type="submit" value="Edit article">
            </form>

            <a href="index.php">&larr; Back</a>
        </div>
    </div>
    </body>
    </html>


    <?php
} else {
    header('Location: index.php');
}