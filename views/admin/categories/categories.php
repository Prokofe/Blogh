<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-9">
        <div class="content">
            <b>Manage categories</b>
            <hr>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Category title</th>
                    <th class="w-25" colspan="2">Action</th>
                </tr>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category['name']; ?></td>
                        <td><a class="btn btn-outline-secondary btn-sm"
                               href="<?= INDEX ?>/admin/categories/edit/<?php echo $category['id'] ?>" role="button">Edit</a>
                        </td>
                        <td><a class="btn btn-outline-secondary btn-sm"
                               href="<?= INDEX ?>/admin/categories/delete/<?php echo $category['id'] ?>" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <a class="btn btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/admin/categories/add" role="button">Add
                category</a>
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
