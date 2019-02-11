<?php


$posts = readData('posts.txt');
$users = readData('users.txt');


$postModel = new Post($db);
$userModel = new User($db);

$userIds = [];
foreach ($users as $user) {
    $id = $userModel->create($user);
    $userIds[$user['username']] = $id;
}

foreach ($posts as $post) {
    $post['user_id'] = $userIds[$post['user']];
    $postModel->create($post);
}


