
<!--Page d'inscription-->
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
        <label for="confirm_password">Confirm passsword</label>
        <input class="input" id="confirm_password" minlength="8" name="confirm_password" required type="password"/>
        <label for="lname">Last name</label>
        <input class="input" id="lname" name="lname" required type="text"/>
        <label for="fname">First name</label>
        <input class="input" id="fname" name="fname" required type="text"/>
        <label for="bdate">Birth date</label>
        <input class="input" id="bdate" name="bdate" max="<?= date('Y-m-d'); ?>" required type="date"/>
        <label for="gender">Gender</label>
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
<script>
    // le code vient de https://codepen.io/diegoleme/pen/surIK
    let password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;



</script>
