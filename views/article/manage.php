<?php include_once ROOT . '/views/layouts/header.php'; ?>

<div class="row no-gutters">
    <div class="col-sm-12">
        <div class="content">
            <b>Manage articles</b>
            <hr>
            <?php if ($result): ?>
                <p>Article successfully deleted.</p>
            <?php endif; ?>
            <table>
                <tr>
                    <th>Article title</th>
                    <th>Posted on</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo date('Y-m-d', $article['timestamp']); ?></td>
                        <td><a href="<?= INDEX ?>/articles/manage/edit/<?php echo $article['id'] ?>">Edit</a></td>
                        <td><a href="<?= INDEX ?>/articles/manage/delete/<?php echo $article['id'] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <a href="../">&larr; Back</a>
        </div>
    </div>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>
