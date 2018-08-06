<?php include_once ROOT.'/views/layouts/header.php'; ?>

<div class="container">
    <div class="content_sidebar">
        <b><?php echo $article['title']; ?></b>
        <hr>
        <small>
            - posted by: <b><?php echo $article['login']; ?></b>
            on <?php echo date('Y-m-d', $article['timestamp']); ?>
        </small>
        <p>
            <?php echo $article['content']; ?>
        </p>
        <br>
        <a href="../">&larr; Back</a>
    </div>
    <div class="sidebar">
        <b>Categories</b>
        <hr>
        <ul>
            <?php foreach ($categories as $category) { ?>
                <li><a href="../category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
</body>
</html>
