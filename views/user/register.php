<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="content">
        <b>New user registration</b>
        <hr>
        <?php if ($result): ?>
            <p>Successfully registered. </p>
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
                Email: <br>
                <input type="email" size="30" name="email" placeholder="user@user"/><br><br>
                Password: <br>
                <input type="password" size="30" name="password" placeholder="*******"/><br><br>
                <input type="submit" name="submit" class="btn btn-default" value="Register"/>
            </form>
        <?php endif; ?>
    </div>
</div>
</body>
</html>