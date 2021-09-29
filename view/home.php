<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta name="viewport" content="width=device-width, maximum-scale=1.5">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta name="viewport" content="width=device-width, user-scalable=no">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <meta charset="UTF-8">-->
<!--    <title>SportTrack | Accueil</title>-->
<!--    <link href="./style/style.css" rel="stylesheet">-->
<!--    <link href="./img/logo.svg" rel="icon"/>-->
<!--</head>-->
<!---->
<!--<body>-->
<video preload="auto" playsinline autoplay muted loop id="myVideo">
    <source src="./img/video.mp4" type="video/mp4">
</video>

<?php
if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];
    ?>
    <header>
        <h1 onclick="window.location.href='./'">SportTrack</h1>
        <button onclick="burgerMenu()" id="header-burger" class="header-btn header-burger"></button>
        <nav id="menu">
            <button onclick="window.location.href='./'" class="header-btn header-home"></button>
            <button onclick="window.location.href='?page=upload'" class="header-btn header-upload"></button>
            <button onclick="window.location.href='?page=profile'" class="header-btn header-account"></button>
            <form action="./controller/DisconnectUserController.php" method="get">
                <button class="header-btn header-logout"></button>
            </form>
        </nav>
    </header>

    <?php
} else {
    ?>
    <script type="text/javascript">
        window.location.href = './';
    </script>
    <?php
}
?>

<div class=accueil>
    <div class="add-activity">
        <button onclick="window.location.href='?page=upload'" class="header-btn">Add an activity <span>+</span></button>
    </div>
    <?php echo($_SESSION["table"]); ?>

</div>

<script>
    function burgerMenu() {
        let nav = document.getElementById("menu");
        nav.classList.toggle("toggle");
        document.getElementById("header-burger").classList.toggle("toggle");
    }
</script>
<!--</body>-->
<!--</html>-->