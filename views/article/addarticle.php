<?php include_once ROOT . '/views/layouts/header.php'; ?>

    <div class="row no-gutters">
        <div class="col-sm-12">
            <div class="content">
                <b>Add new article</b>
                <hr>
                <?php if ($result): ?>
                    <div class="alert alert-primary" role="alert">Article successfully added.</div>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Article title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-secondary">Add article</button>
                </form>
                <br>
                <a href="<?= INDEX ?> ">&larr; Back</a>
            </div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>