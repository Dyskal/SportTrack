<!DOCTYPE html>
<html lang="en">
<?php
session_start()
?>
<head>
    <meta name="viewport" content="width=device-width, maximum-scale=1.5">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>SportTrack | Profile</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>

<body class="bg-image">
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

<div class="container">
    <h2><?php echo $_SESSION["email"]; ?></h2>
    <form action="./controller/ModifyUserController.php" method="post">


        <label for="fname">First name</label>
        <input value="<?php echo $_SESSION["fname"]; ?>" class="input" id="fname" name="fname" required type="text"/>
        <label for="lname">Last name</label>
        <input value="<?php echo $_SESSION["lname"]; ?>" class="input" id="lname" name="lname" required type="text"/>
        <label for="bdate">Birth date</label>
        <input value="<?php echo $_SESSION["bdate"]; ?>" class="input" id="bdate" name="bdate"
               max="<?= date('Y-m-d'); ?>" required type="date"/>
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option
                <?php
            if ($_SESSION["gender"] == "M") {
                echo "selected";
            }; ?>
                    value="M">Man
            </option>
            <option
                <?php
                if ($_SESSION["gender"] == "W") {
                    echo "selected";
                }; ?>
                    value="W">Women</option>
            <option
                <?php
                if ($_SESSION["gender"] == "O") {
                    echo "selected";
                }; ?>
                    value="O">Other</option>
        </select>
        <label for="height">Height:</label>
        <input value="<?php echo $_SESSION["height"]; ?>" class="input" id="height" min="0" name="height"
               oninput="validity.valid||(value='');" required
               type="number"/>
        <label for="weight">Weight:</label>
        <input value="<?php echo $_SESSION["weight"]; ?>" class="input" id="weight" min="0" name="weight"
               oninput="validity.valid||(value='');" required
               type="number"/>
        <input class="button right" type="submit" value="Save changes"/>
        <input class="button cancel" onclick="window.location.href='./'" type="button" value="Cancel" formnovalidate/>
    </form>
</div>
<?php
if (isset($_GET['msg'])) {

    $error = urldecode($_GET['msg']);
    if (strlen($error) > 1) {
        ?>
        <div style="background: <?php if (isset($_GET['color'])){ echo $_GET['color'];} ?>" class="error" id="hideDiv">
            <?php echo($error); ?>
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
</body>
</html>