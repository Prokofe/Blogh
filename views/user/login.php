<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="content">
        <b>User login</b>
        <hr>
        <?php if ($result): ?>
            <p>Successfully logged in. </p>
        <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>- <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <br>
            <form action="" method="post">
                Login: <br>
                <input type="text" size="30" name="login" placeholder="User"/><br><br>
                Password: <br>
                <input type="password" size="30" name="password" placeholder="*******"/><br><br>
                <input type="submit" name="submit" class="btn btn-default" value="Login"/>
            </form>
        <?php endif; ?>
    </div>
</div>
</body>
</html>