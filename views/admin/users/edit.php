<?php include_once ROOT . '/views/layouts/header.php'; ?>

    <div class="row no-gutters">
        <div class="col-sm-12">
            <div class="content">
                <b>Edit user</b>
                <hr>
                <?php if ($result): ?>
                    <div class="alert alert-primary" role="alert">User edited successfully.</div>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control" name="login" value="<?= $user['login'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option></option>
                                <option value="user">user</option>
                                <option value="author">author</option>
                                <option value="administrator">administrator</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-secondary">Edit user</button>
                </form>
                <br>
                <a href="javascript:history.back()">&larr; Back</a>
            </div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>