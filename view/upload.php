<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SportTrack | Upload</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>

<body>
<header>
    <h1 onclick="window.location.href='./'">SportTrack</h1>
</header>
<div class=container>
    <h2>Upload</h2>
    <form>
        <div class="upload-btn-wrapper">
            <button class="btn">Upload an activity</button>
            <input accept=".json, application/json" id="file" name="file" required type="file"/>
        </div>
        <input class="button" type="submit" value="Submit"/>
    </form>
</div>
</body>
</html>