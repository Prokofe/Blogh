<?php include_once ROOT . '/views/layouts/header.php'; ?>

    <div class="row no-gutters">
        <div class="col-sm-12">
            <div class="content">
                <b>Edit category</b>
                <hr>
                <?php if ($result): ?>
                    <div class="alert alert-primary" role="alert">Category edited successfully.</div>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Category name</label>
                        <input type="text" class="form-control" name="name" value="<?= $category['name'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-secondary">Edit category</button>
                </form>
                <br>
                <a href="javascript:history.back()">&larr; Back</a>
            </div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>