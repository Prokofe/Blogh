<html>
<head>
    <title>Blogh - main page</title>
    <link rel="stylesheet" href="../template/style.css"/>
</head>

<body>
<div class="header">
    <div class="logo">
        <a href="#">Blogh</a>
    </div>
    <div class="menu">
        <a href="#">Register</a> |
        <a href="#">Login</a>
    </div>
</div>
<div class="container">
    <div class="content_sidebar">
        <ol>
            <?php foreach ($latestArticles as $article) { ?>
                <li><a href="article/<?php echo $article['id']; ?>">
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
                <li><a href="category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
</body>
</html>