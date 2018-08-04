<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if (empty($title) || empty($content)) {
            $error = 'All fields required!';
        } else {
            $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?, ?)');

            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());

            $query->execute();

            header('Location: index.php');
        }
    }
    ?>
    <html>
    <head>
        <title>Blogh Admin</title>
        <link rel="stylesheet" href="../assets/style.css"/>
    </head>

    <body>
    <div class="container">
        <a href="index.php" id="logo">Blogh - Admin</a>
        <br>
        <div class="content">
            <h4>Add Article</h4>
            <?php if (isset($error)) { ?>
                <small><?php echo $error; ?></small>
                <br><br>
            <?php } ?>
            <br><br>
            <form action="add.php" method="post" autocomplete="off">
                <input type="text" name="title" placeholder="Title"/><br><br>
                <textarea rows="15" cols="50" name="content" placeholder="Content"></textarea><br><br>
                <input type="submit" value="Add article">
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

?>