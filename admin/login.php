<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {

    header('Location: index.php');

} else {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($username) || empty($password)) {
            $error = 'All fields required!';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();

            if ($num == 1) {
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                $error = "Wrong login or password!";
            }
        }
    }
    ?>
    <html>
    <head>
        <title>Blogh - Admin</title>
        <link rel="stylesheet" href="../assets/style.css"/>
    </head>

    <body>
    <div class="container">
        <a href="index.php" id="logo">Blogh - Admin</a>
        <br><br>
        <?php if (isset($error)) { ?>
            <small><?php echo $error; ?></small>
            <br><br>
        <?php } ?>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" value="Login"/>
        </form>
    </div>
    </body>
    </html>

    <?php
}
