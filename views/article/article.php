<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-9">
        <div class="content">
            <b><?php echo $article['title']; ?></b>

            <small>
                - posted by: <u><?php echo $article['login']; ?></u>
                on <?php echo date('Y-m-d', $article['timestamp']); ?>
            </small>
            <hr>
            <p>
                <?php echo nl2br($article['content']); ?>
            </p>
            <br>
            <a href="javascript:history.back()">&larr; Back</a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="sidebar">
            <b>Categories</b>
            <hr>
            <ul>
                <?php foreach ($categories as $category) { ?>
                    <li>
                        <a href="<?= INDEX ?>/category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="col-sm-9 content">
    <?php if (!User::isGuest()): ?>
    <div>
        <form action="<?= INDEX ?>/article/comment" method="post">
            <div class="form-group">
                <textarea class="form-control" name="comment" rows="2"></textarea>
            </div>
            <input type="hidden" name="article_id" value="<?php echo($article['id']); ?>"/>
            <button type="submit" name="submit" class="btn btn-secondary btn-sm">Leave a comment</button>
        </form>
    </div>
    <hr>
    <?php endif; ?>
    <?php if ($comments): ?>
        <?php foreach ($comments as $comment): ?>
            <div class="alert alert-light" role="alert">
                <?= $comment['comment'] ?><br>
                <small> - by <u><?= $comment['login'] ?></u></small>
                <?php if (User::isAdmin()): ?>
                    <a class="close" href="<?= INDEX ?>/admin/comments/delete/<?= $article['id'] ?>/<?= $comment['id'] ?>"
                       role="button">&times;</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No comments posted yet...</p>
    <?php endif; ?>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>
