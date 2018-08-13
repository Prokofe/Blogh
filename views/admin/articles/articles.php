<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-9">
        <div class="content">
            <b>Manage articles</b>
            <hr>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Article title</th>
                    <th>Posted on</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo date('Y-m-d', $article['timestamp']); ?></td>
                        <td><a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/articles/manage/edit/<?php echo $article['id'] ?>" role="button">Edit</a></td>
                        <td><a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/articles/manage/delete/<?php echo $article['id'] ?>" role="button">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
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
                    <li><a href="<?= INDEX ?>/admin/articles">Articles</a></li>
                    <li><a href="<?= INDEX ?>/admin/categories">Categories</a></li>
                    <li><a href="<?= INDEX ?>/admin/users">Users</a></li>
            </ul>
        </div>
    </div>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>
