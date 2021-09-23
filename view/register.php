<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SportTrack | Register</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>

<body>
<header>
    <h1 onclick="window.location.href='./'">SportTrack</h1>
</header>
<div class="container">
    <h2>Register</h2>
    <form action="./controller/AddUserController.php" method="post">
        <label for="mail">Email address:</label><br>
        <input class="input" id="mail" name="mail" required type="text"/><br>
        <label for="password">Password:</label><br>
        <input class="input" id="password" minlength="8" name="password" required type="password"/><br>
        <label for="lname">Last name:</label><br>
        <input class="input" id="lname" name="lname" required type="text"/><br>
        <label for="fname">First name:</label><br>
        <input class="input" id="fname" name="fname" required type="text"/><br>
        <label for="bdate">Birth date:</label><br>
        <input class="input" id="bdate" name="bdate" required type="date"/><br>
        <label>Gender:</label><br>
        <div class="container-radio">
            <div>
                <input checked class="radio" id="w" value="W" name="gender" required type="radio"/>
                <label for="w">Woman</label></div>
            <div>
                <input class="radio" id="m" value="M" name="gender" type="radio">
                <label for="m">Man</label>
            </div>
            <div>
                <input class="radio" id="o" value="O" name="gender" type="radio">
                <label for="o">Other</label>
            </div>
        </div>
        <label for="height">Height:</label><br>
        <input class="input" id="height" min="0" name="height" oninput="validity.valid||(value='');" required
        type="number"/><br>
        <label for="weight">Weight:</label><br>
        <input class="input" id="weight" min="0" name="weight" oninput="validity.valid||(value='');" required
        type="number"/><br>
        <input class="button right" type="submit" value="Submit"/>
    </form>
</div>
</body>
</html>