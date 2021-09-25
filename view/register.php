<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SportTrack | Register</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>

<body class="bg-image">
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
    <h2>Register</h2>
    <form action="./controller/AddUserController.php" method="post">
        <label for="mail">Email address</label>
        <input class="input" id="mail" name="mail" required type="text"/>
        <label for="password">Password</label>
        <input class="input" id="password" minlength="8" name="password" required type="password"/>
        <label for="lname">Last name</label>
        <input class="input" id="lname" name="lname" required type="text"/>
        <label for="fname">First name</label>
        <input class="input" id="fname" name="fname" required type="text"/>
        <label for="bdate">Birth date</label>
        <input class="input" id="bdate" name="bdate" required type="date"/>
        <label for="gender">Gender</label>
        <!--        <div class="container-radio">-->
        <!--            <div>-->
        <!--                <input checked class="radio" id="w" value="W" name="gender" required type="radio"/>-->
        <!--                <label for="w">Woman</label></div>-->
        <!--            <div>-->
        <!--                <input class="radio" id="m" value="M" name="gender" type="radio">-->
        <!--                <label for="m">Man</label>-->
        <!--            </div>-->
        <!--            <div>-->
        <!--                <input class="radio" id="o" value="O" name="gender" type="radio">-->
        <!--                <label for="o">Other</label>-->
        <!--            </div>-->
        <!--        </div>-->
        <select name="gender" id="gender">
            <option value="M">Man</option>
            <option value="W">Women</option>
            <option value="O">Other</option>
        </select>
        <label for="height">Height</label>
        <input class="input" id="height" min="0" name="height" oninput="validity.valid||(value='');" required
               type="number"/>
        <label for="weight">Weight</label>
        <input class="input" id="weight" min="0" name="weight" oninput="validity.valid||(value='');" required
               type="number"/>
        <input class="button right" type="submit" value="Submit"/>
    </form>
</div>
</body>
</html>