<?php

$posts = readData('posts.txt');

?>

<?php foreach ($posts as $index => $post): ?>

    <div>
        <?php include '_post_head.php' ?>
        <p><?= shortText($post['text']) ?></p>
        <a href="<?= getBaseUrl() ?>/view_post?index=<?= $index ?>">View post</a>
        <hr>
    </div>
<?php endforeach ?>
