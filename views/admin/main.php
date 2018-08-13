<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-9">
        <div class="content">
            <b>Blog statistics</b>
            <hr>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Name</th>
                    <th class="w-25">Count</th>
                </tr>
                <tr>
                    <td>Total articles</td>
                    <td><?= $articlesCount; ?></td>
                </tr>
                <tr>
                    <td>Total categories</td>
                    <td><?= $categoriesCount; ?></td>
                </tr>
                <tr>
                    <td>Total comments</td>
                    <td><?= $commentsCount; ?></td>
                </tr>
                <tr>
                    <td>Total users</td>
                    <td><?= $usersCount; ?></td>
                </tr>
            </table>
            <br>
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
