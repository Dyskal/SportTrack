<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SportTrack | Login</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>
<body class="bg-image">
<header>
    <h1 onclick="window.location.href='./'">SportTrack</h1>
</header>
<div class="container">
    <h2>Login</h2>
    <form action="./controller/ConnectUserController.php" method="post">
        <label for="email">Email</label><br>
        <input class="input" id="email" name="email" required type="email"><br>
        <label for="password">Password</label><br>
        <input class="input" id="password" name="password" minlength="8" required type="password"><br>
        <button onclick="window.location.href='?page=register'" name="register" class="button" >Register
        </button>
        <button class="button right">Login</button>
        <br>
        <a onclick="alert('not implemented yet')">Forget password ?</a><br>
    </form>

</div>
<?php
if (isset($_GET['msg'])) {
    $error = urldecode($_GET['msg']);
    if (strlen($error) > 1) {
        ?>
        <div class="error" id="hideDiv">
            <?php
            echo $error;
            ?>
        </div>
        <?php
    }

}

?>
<script>
    setTimeout(function (){document.getElementById("hideDiv").classList.add("hide");console.log("uho");}, 10000)



</script>
</body>
</html>