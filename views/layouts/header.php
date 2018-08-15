<?php include_once(ROOT . '/models/user.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= TITLE ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= ASSETS ?>favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">
    <script src="<?= ASSETS ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= ASSETS ?>js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row no-gutters header">
        <div class="col-sm-8">
            <div class="logo">
                <a href="<?= INDEX ?>"><?= TITLE ?></a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="menu">
                <?php if (User::isGuest()): ?>
                    <a href="<?= INDEX ?>/register">Register</a> |
                    <a href="<?= INDEX ?>/login">Login</a>
                <?php elseif (User::isAuthor()): ?>
                    <small><a href="<?= INDEX ?>/logout">Logout<span class="badge">(<?= User::getUserName()['login'] ?>)</span></a></small>
                    <br>
                    <a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/article/add" role="button">Add
                        article</a>
                    <a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/articles/manage" role="button">Manage
                        articles</a>
                <?php elseif (User::isAdmin()): ?>
                    <a href="<?= INDEX ?>/logout">Logout<span class="badge">(<?= User::getUserName()['login'] ?>)</span></a>
                    <br>
                    <a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/article/add" role="button">Add
                        article</a>
                    <a class="btn btn-outline-secondary btn-sm" href="<?= INDEX ?>/admin/main" role="button">Manage
                        blog</a>
                <?php else: ?>
                    <small><a href="<?= INDEX ?>/logout">Logout<span class="badge">(<?= User::getUserName()['login'] ?>)</span></a></small>
                    <br>
                <?php endif; ?>
            </div>
        </div>
    </div>