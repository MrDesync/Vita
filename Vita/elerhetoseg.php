<!DOCTYPE html>
<html lang="hu">

<head>

    <?php
    echo file_get_contents("header.html");
    ?>

</head>

<body>

    <div>
        <div class="contact">
            <h3>Elérhetőség</h3>
            <p>Telefon: +36-201234567</p>
            <p>E-mail: vitashop@gmail.com</p>
            <p>Cim: Bp 1111 xy út 12</p>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86245.56768706012!2d19.018420708133934!3d47.506002697078955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c34b40069a49%3A0xcbc6c6f1ad19dc7b!2sGoGo%20hami%20Junior!5e0!3m2!1shu!2shu!4v1678199109520!5m2!1shu!2shu"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <?php
    echo file_get_contents("footer.html");
    ?>

    <!--- js script for menu --->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>