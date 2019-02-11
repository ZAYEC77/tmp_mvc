<html>
<head>
    <title>Blog</title>
    <style>
        p {
            margin: 0;
        }
        h1 {
            margin: 0;
        }
        footer {
            margin-top: 50px;
        }
    </style>
</head>

<body>

<ul>
    <li><a href="<?= getBaseUrl() ?>/">Home</a></li>
    <li><a href="<?= getBaseUrl() ?>/users">Users</a></li>
    <?php if (!hasUser()): ?>
        <li><a href="<?= getBaseUrl() ?>/registration">Registration</a></li>
        <li><a href="<?= getBaseUrl()   ?>/login">Login</a></li>
    <?php else: ?>
        <li><a href="<?= getBaseUrl() ?>/add_post">Add post</a></li>
        <li><a href="<?= getBaseUrl() ?>/account">My account</a></li>
        <li><a href="<?= getBaseUrl() ?>/logout">Logout (<?= getUsername() ?>)</a></li>
    <?php endif ?>
</ul>

