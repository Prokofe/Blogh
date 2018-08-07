<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-8">
        <div class="content">
            <b><?php echo $article['title']; ?></b>

            <small>
                - posted by: <u><?php echo $article['login']; ?></u>
                on <?php echo date('Y-m-d', $article['timestamp']); ?>
            </small>
            <hr>
            <p>
                <?php echo $article['content']; ?>
            </p>
            <br>
            <a href="../">&larr; Back</a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="sidebar">
            <b>Categories</b>
            <hr>
            <ul>
                <?php foreach ($categories as $category) { ?>
                    <li><a href="../category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<?php include_once ROOT.'/views/layouts/footer.php'; ?>
