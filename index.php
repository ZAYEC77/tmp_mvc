<?php

include 'functions.php';

if (isset($_SERVER['PATH_INFO'])) {
    $pathInfo = $_SERVER['PATH_INFO'];
} elseif (isset($_GET['route'])) {
    $pathInfo = $_GET['route'];
} else {
    $pathInfo = '/';
}

try {
    $db = new Connection("root", "", "php_course", "localhost");

    ob_start();

    switch ($pathInfo) {
        case '/migration':
            include 'migration.php';
            break;
        case '/users':
            include 'users.php';
            break;
        case '/user_posts':
            include 'user_posts.php';
            break;
        case '/view_post':
            include 'view_post.php';
            break;
        case '/add_post':
            include 'add_post.php';
            break;
        case '/edit_post':
            include 'edit_post.php';
            break;
        case '/registration':
            include 'registration.php';
            break;
        case '/login':
            include 'login.php';
            break;
        case '/logout':
            include 'logout.php';
            break;
        case '/account':
            include 'account.php';
            break;
        case '/':
            include 'default.php';
            break;
        default:
            $str = "<h1>404</h1><p>Page not found</p>";
            throw new Exception($str);
    }

    $s = ob_get_clean();
} catch (Exception $e) {
    $s = 'ОЙ :(<br>' . $e->getMessage();
}

include 'head.php';
echo $s;
include 'footer.php';

?>
