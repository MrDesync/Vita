<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">

<body>

    <?php
    echo file_get_contents("header.html");
    ?>

    <div class="formBox">
        <div class="buttonBox">
            <div class="btn" id="Btn"></div>
            <button type="button" class="toggleBtn" onclick="login()">Bejelentkezés</button>
            <button type="button" class="toggleBtn" onclick="register()">Regisztráció</button>
        </div>
        <form name="belep" id="login" action="belep_muv.php" method="POST" class="inputGroup">
            <input type="text" class="inputField" name="UserName" placeholder="Felhasználónév" required>
            <input type="password" class="inputField" name="UserPassword" placeholder="Jelszó" required>
            <button type="submit" class="submitBtn">Belépés</button>
        </form>
        <form name="reg" id="register" action="reg_muv.php" method="POST" class="inputGroup">
            <input type="text" class="inputField" name="UserName" placeholder="Felhasználónév" required>
            <input type="password" class="inputField" name="UserPassword" placeholder="Jelszó" required>
            <input type="password" class="inputField" name="UserPassword2" placeholder="Jelszó megerősítés" required>
            <input type="email" class="inputField" name="UserEmail" placeholder="E-mail" required>
            <button type="submit" class="submitBtn">Regisztráció</button>
        </form>
    </div>


    <?php
    echo file_get_contents("footer.html");
    ?>
    <script>
        var menuItems = document.getElementById("menuItems");

        menuItems.style.maxHeight = "0px";

        function menuToggle() {
            if (menuItems.style.maxHeight == "0px") {
                menuItems.style.maxHeight = "500px"
            }
            else {
                menuItems.style.maxHeight = "0px"
            }
        }
    </script>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("Btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "160px";
        }
        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>

</html>