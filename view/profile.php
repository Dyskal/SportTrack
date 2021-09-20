<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SportTrack | Profile</title>
    <link href="../style/style.css" rel="stylesheet">
    <link href="../img/logo.svg" rel="icon"/>
</head>

<body>
<header>
    <h1 onclick="window.location.href='./'">SportTrack</h1>
</header>
<div class="container">
    <h2>Profile</h2>
    <form>
        <label for="fname">First name:</label><br>
        <input class="input" id="fname" name="fname" required type="text"/><br>
        <label for="lname">Last name:</label><br>
        <input class="input" id="lname" name="lname" required type="text"/><br>
        <label for="date">Birth date:</label><br>
        <input class="input" id="date" name="date" required type="date"/><br>
        <label>Gender:</label><br>
        <div class="container-radio">
            <div>
                <input checked class="radio" id="w" name="sex" required type="radio"/>
                <label for="w">Woman</label></div>
            <div>
                <input class="radio" id="m" name="sex" type="radio">
                <label for="m">Man</label>
            </div>
            <div>
                <input class="radio" id="o" name="sex" type="radio">
                <label for="o">Other</label>
            </div>
        </div>
        <label for="height">Height:</label><br>
        <input class="input" id="height" min="0" name="height" oninput="validity.valid||(value='');" required
               type="number"/><br>
        <label for="weight">Weight:</label><br>
        <input class="input" id="weight" min="0" name="weight" oninput="validity.valid||(value='');" required
               type="number"/><br>
        <label for="mail">Email address:</label><br>
        <input class="input" id="mail" name="mail" required type="text"/><br>
        <label for="password">Password:</label><br>
        <input class="input" id="password" minlength="8" name="password" required type="password"/><br>
        <input class="button right" type="submit" value="Save changes"/>
        <input class="button cancel" type="button" value="Cancel" formnovalidate/>
    </form>
</div>
</body>
</html>