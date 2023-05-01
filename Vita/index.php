<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">

<body>

    <?php
    echo file_get_contents("header.html");
    echo file_get_contents("maincontent.html");
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
    <script>
        var bannerStatus = 1;
        var bannerTimer = 6000;

        window.onload = function()
        {
            bannerLoop();
        }

        var stratBannerLoop = setInterval(function()
        {
            bannerLoop();
        },bannerTimer);

        document.getElementById("main-banner").onmouseenter =function()
        {
            clearInterval(stratBannerLoop);
        }
        document.getElementById("main-banner").onmouseleave =function()
        {
            stratBannerLoop = setInterval(function()
            {
                bannerLoop();
            },bannerTimer);
        }

    function bannerLoop()
    {
        if(bannerStatus === 1)
        {
            document.getElementById("imgban2").style.opacity = "0";
            setTimeout(function()
            {
                document.getElementById("imgban1").style.right = "0px";
                document.getElementById("imgban1").style.zIndex = "1000";
                document.getElementById("imgban2").style.right = "-1200px";
                document.getElementById("imgban2").style.zIndex = "1500";
                document.getElementById("imgban3").style.right = "1200px";
                document.getElementById("imgban3").style.zIndex = "500";
            },500);
            setTimeout(function()
            {
                document.getElementById("imgban2").style.opacity = "1";
            },1000);
            bannerStatus = 2;
        }
        else if(bannerStatus === 2)
        {
            document.getElementById("imgban3").style.opacity = "0";
            setTimeout(function()
            {
                document.getElementById("imgban2").style.right = "0px";
                document.getElementById("imgban2").style.zIndex = "1000";
                document.getElementById("imgban3").style.right = "-1200px";
                document.getElementById("imgban3").style.zIndex = "1500";
                document.getElementById("imgban1").style.right = "1200px";
                document.getElementById("imgban1").style.zIndex = "500";
            },500);
            setTimeout(function()
            {
                document.getElementById("imgban3").style.opacity = "1";
            },1000);
            bannerStatus = 3;
        }
        else if(bannerStatus === 3)
        {
            document.getElementById("imgban1").style.opacity = "0";
            setTimeout(function()
            {
                document.getElementById("imgban3").style.right = "0px";
                document.getElementById("imgban3").style.zIndex = "1000";
                document.getElementById("imgban1").style.right = "-1200px";
                document.getElementById("imgban1").style.zIndex = "1500";
                document.getElementById("imgban2").style.right = "1200px";
                document.getElementById("imgban2").style.zIndex = "500";
            },500);
            setTimeout(function()
            {
                document.getElementById("imgban1").style.opacity = "1";
            },1000);
            bannerStatus = 1;
        }
        
    }

    </script>
</body>

</html>