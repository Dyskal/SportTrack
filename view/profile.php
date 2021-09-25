<!DOCTYPE html>
<html lang="en">

<head>
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
            <button class="header-btn header-logout"></button></form>

    </nav>
</header>
<div class="container">
    <h2>Profile</h2>
    <form>
        <label for="fname">First name</label>
        <input class="input" id="fname" name="fname" required type="text"/>
        <label for="lname">Last name</label>
        <input class="input" id="lname" name="lname" required type="text"/>
        <label for="date">Birth date</label>
        <input class="input" id="date" name="date" required type="date"/>
        <label>Gender</label>
        <select  name="gender">
            <option value="M">Man</option>
            <option value="W">Women</option>
            <option value="O">Other</option>
        </select>
        <label for="height">Height:</label>
        <input class="input" id="height" min="0" name="height" oninput="validity.valid||(value='');" required
               type="number"/>
        <label for="weight">Weight:</label>
        <input class="input" id="weight" min="0" name="weight" oninput="validity.valid||(value='');" required
               type="number"/>
        <label for="mail">Email address</label>
        <input class="input" id="mail" name="mail" required type="text"/>
        <label for="password">Password</label>
        <input class="input" id="password" minlength="8" name="password" required type="password"/>
        <input class="button right" type="submit" value="Save changes"/>
        <input class="button cancel" type="button" value="Cancel" formnovalidate/>
    </form>
</div>
</body>
</html>