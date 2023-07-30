<?php /** @var View $this */ ?>
<?php use App\core\Application,App\core\View;?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo './Css/style.css' ?>">
    <link rel="icon" type="image/x-icon" href="./resource//image/titleImage.png">
    <title><?php echo $this->getTitle( )?></title>
</head>
<body>
<header>
    <h2 class="logo">PHP MVC Framework</h2>
    <nav class="navigation">
        <a class="a" href="/">Home</a>
        <?php if (!Application::$app->isGuest()): ?>
            <a class="a" href="/profile">Profile</a>
        <?php endif; ?>
        <a class="a" href="/contact">Contact</a>
        <a class="a" href="">About</a>
        <a class="a" href="">Service</a>
        <?php if (Application::$app->isGuest()): ?>
            <a href="/login">
                <button  class="brn_login">Login</button>
            </a>
        <?php else: ?>
            <a href="/logout">
                <button  class="brn_login">Log Out</button>
            </a>
        <?php endif; ?>
    </nav>
</header>

    {{content}}

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./js/animationLabel.js"></script>
<script src="./js/redirect.js"></script>
<script src="./js/closeButton.js"></script>
</body>
</html>
