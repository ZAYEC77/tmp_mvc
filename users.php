<?php
$users = readData('users.txt');
?>
<ol>
    <?php foreach ($users as $user): ?>
        <li>
            <a href="<?= getBaseUrl() ?>/user_posts?username=<?= $user['username'] ?>"><?= $user['username'] ?></a>
        </li>
    <?php endforeach ?>
</ol>
