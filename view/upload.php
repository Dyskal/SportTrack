<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta name="viewport" content="width=device-width, maximum-scale=1.5">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta name="viewport" content="width=device-width, user-scalable=no">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <meta charset="UTF-8">-->
<!--    <title>SportTrack | Upload</title>-->
<!--    <link href="./style/style.css" rel="stylesheet">-->
<!--    <link href="./img/logo.svg" rel="icon"/>-->
<!--</head>-->
<!---->
<!--<body class="bg-image">-->
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

<div class=container>
    <h2>Upload</h2>
    <form action="./controller/UploadActivityController.php" method="post" enctype="multipart/form-data">
        <div class="upload-btn-wrapper">
            <input accept=".json, application/json" id="file" name="file" required type="file"/>
        </div>
        <input class="button" type="submit" value="Submit"/>
    </form>
</div>
<!--</body>-->
<!--</html>-->