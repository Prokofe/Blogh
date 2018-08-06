<?php include_once(ROOT . '/models/user.php'); ?>
<html>
<head>
    <title>Blogh</title>
    <link rel="shortcut icon" href="<?= TEMPL ?>favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= TEMPL ?>style.css"/>
</head>

<body>
<div class="header">
    <div class="logo">
        <a href="<?= INDEX ?>">Blogh</a>
    </div>
    <div class="menu">
        <?php if (User::checkLogged()): ?>
            <small>Hi, <?php echo User::getUserName()['login']; ?> </small>
        <?php endif; ?>
        <?php if (User::isGuest()): ?>
            <a href="register">Register</a> |
            <a href="login">Login</a>
        <?php elseif (User::isAuthor()): ?>
            <a href="<?= INDEX ?>/article/add">Add article</a> |
            <a href="<?= INDEX ?>/articles/manage">Manage articles</a> |
            <a href="<?= INDEX ?>/logout">Logout</a>
        <?php elseif (User::isAdmin()): ?>
            <a href="#">Add article</a> |
            <a href="#">Admin panel</a> |
            <a href="<?= INDEX ?>/logout">Logout</a>
        <?php else: ?>
            <a href="<?= INDEX ?>/logout">Logout</a>
        <?php endif; ?>

    </div>
</div>
