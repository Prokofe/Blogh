<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();


?>

<html>
<head>
    <title>Blogh - main page</title>
    <link rel="stylesheet" href="assets/style.css"/>
</head>

<body>
<div class="container">
    <a href="index.php" id="logo">Blogh</a>
    <div class="content">
        <ol>
            <?php foreach ($articles as $article) { ?>
                <li><a href="article.php?id=<?php echo $article['article_id']; ?>">
                        <?php echo $article['article_title']; ?>
                    </a>
                    -
                    <small>
                        posted <?php echo date('Y-m-d', $article['article_timestamp']); ?>
                    </small>
                </li>
            <?php } ?>
        </ol>
    </div>
</div>
</body>
</html>