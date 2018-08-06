<?php include_once ROOT.'/views/layouts/header.php'; ?>

<div class="container">
    <div class="content_sidebar">
        <b>Latest posts</b>
        <hr>
        <ol>
            <?php foreach ($latestArticles as $article) { ?>
                <li><a href="../article/<?php echo $article['id']; ?>">
                        <?php echo $article['title']; ?></a>
                    <small>
                        - posted by: <b><?php echo $article['login']; ?></b>
                        on <?php echo date('Y-m-d', $article['timestamp']); ?>
                    </small>
                </li>
            <?php } ?>
        </ol>
    </div>
    <div class="sidebar">
        <b>Categories</b>
        <hr>
        <ul>
            <?php foreach ($categories as $category) { ?>
                <li><a href="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
</body>
</html>