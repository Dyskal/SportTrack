<header>
    <h1 onclick="window.location.href='./'">SportTrack</h1>
    <button onclick="burgerMenu()" id="header-burger" class="header-btn header-burger"></button>
    <nav id="menu">
        <button onclick="window.location.href='./'" class="header-btn header-home"></button>
        <button onclick="window.location.href='?page=register'" class="header-btn header-login">Register</button>
        <button onclick="window.location.href='?page=login'" class="header-btn header-login">Login</button>
    </nav>
</header>

<div class="container">
    <h2>Login</h2>
    <form action="./controller/ConnectUserController.php" method="post">
        <label for="email">Email</label>
        <input class="input" id="email" name="email" required type="email">
        <label for="password">Password</label>
        <input class="input" id="password" name="password" minlength="8" required type="password">
        <div class="input-btns">
            <button onclick="window.location.href='?page=register'" name="register" class="button">Register</button>
            <button class="button right">Login</button>
        </div>
        <a onclick="alert('not implemented yet')">Forgot password ?</a>
    </form>
</div>

<?php
if (isset($_GET['msg'])) {
    $error = urldecode($_GET['msg']);
    if (strlen($error) > 1) {
        ?>
        <div style="background: <?php if (isset($_GET['color'])) {
            echo $_GET['color'];
        } ?>" class="error" id="hideDiv">
            <?php echo(htmlspecialchars($error)); ?>
        </div>
        <?php
    }
}
?>
<script>
    setTimeout(function() {
        document.getElementById("hideDiv").classList.add("hide");
    }, 10000)
</script>
