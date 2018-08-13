<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-9">
        <div class="content">
            <b>Manage users</b>
            <hr>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Login</th>
                    <th>Email</th>
                    <th class="w-25" colspan="2">Action</th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <?php if($user['active'] == 0) { ?>
                            <td><s><?= $user['login']; ?></s></td>
                        <?php } else { ?>
                        <td><?= $user['login']; ?></td>
                        <?php } ?>
                        <td><?= $user['email']; ?></td>
                        <td><a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/admin/users/edit/<?= $user['id'] ?>" role="button">Edit</a></td>
                        <td><a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/admin/users/deactivate/<?= $user['id'] ?>" role="button">Deactivate</a></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <nav>
                <?= $pagination->get(); ?>
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
