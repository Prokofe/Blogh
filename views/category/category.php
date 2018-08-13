<?php include_once ROOT . '/views/layouts/header.php'; ?>

    <div class="row no-gutters">
        <div class="col-sm-9">
            <div class="content">
                <b>Latest posts</b>
                <hr>
                <ol>
                    <?php foreach ($latestArticles as $article) { ?>
                        <li><a href="<?= INDEX?>/article/<?php echo $article['id']; ?>">
                                - <?php echo $article['title']; ?></a>
                            <small>
                                - posted by: <u><?php echo $article['login']; ?></u>
                                on <?php echo date('Y-m-d H:i', $article['timestamp']); ?>
                            </small>
                        </li>
                    <?php } ?>
                </ol>
                <br>
                <nav>
                        <?php echo $pagination->get(); ?>
                </nav>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="sidebar">
                <b>Categories</b>
                <hr>
                <ul>
                    <?php foreach ($categories as $category) { ?>
                        <li><a href="<?= INDEX?>/category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>