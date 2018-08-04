<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

if (isset($_SESSION['logged_in'])) {

    $article = new Article();
    $articles = $article->fetch_all();
    ?>

    <html>
    <head>
        <title>Blogh - Admin</title>
        <link rel="stylesheet" href="../assets/style.css"/>
    </head>

    <body>
    <div class="container">

            <a href="index.php" id="logo">Blogh - Admin</a>
            <br>
        <div class="menu">
            <a href="add.php">Add article</a> |
            <a href="logout.php">Logout</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Article title</th>
                    <th>Posted on</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <td><?php echo $article['article_title']; ?></td>
                        <td><?php echo date('Y-m-d', $article['article_timestamp']); ?></td>
                        <td><a href="edit.php?id=<?php echo $article['article_id']; ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $article['article_id'] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </body>
    </html>
    <?php

} else {
    header('Location: login.php');
}
