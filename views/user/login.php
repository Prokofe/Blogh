<?php include_once ROOT . '/views/layouts/header.php'; ?>

    <div class="row no-gutters">
        <div class="col-sm-12">
            <div class="content">
                <b>User login</b>
                <hr>
                <?php if ($result): ?>
                    <p>Successfully logged in. </p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div></li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" class="form-control" name="login" placeholder="User">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="*******">
                        </div>
                        <button type="submit" name="submit" class="btn btn-secondary">Login</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>