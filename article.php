<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);

    ?>
    <html>
    <head>
        <title>Blogh - <?php echo $data['article_title']; ?></title>
        <link rel="stylesheet" href="assets/style.css"/>
    </head>

    <body>
    <div class="container">
        <a href="index.php" id="logo">Blogh</a>
        <div class="content">
            <h4>
                <?php echo $data['article_title']; ?>
            </h4>
                <small>
                    - posted <?php echo date('Y-m-d', $data['article_timestamp']); ?>
                </small>


            <p>
                <?php echo $data['article_content']; ?>
            </p>
            <br>
            <a href="index.php">&larr; Back</a>
        </div>
    </div>
    </body>
    </html>

    <?php
} else {
    header('Location: index.php');
    exit();
}

?>