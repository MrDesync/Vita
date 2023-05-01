
<?php
	echo file_get_contents("header.html");
    session_start();

    if (!empty($_SESSION["UserID"]))
    {
        session_destroy();
?>
        <h2><?php echo "Ön sikeresen kijelentkezett!"?></h2>
<?php
    }
?>

<?php
echo file_get_contents("footer.html");
?>
 
    <script>
        var menuItems = document.getElementById("menuItems");

         menuItems.style.maxHeight = "0px";

         function menuToggle() 
        {
             if (menuItems.style.maxHeight == "0px")
            {
            menuItems.style.maxHeight = "500px"
            }
            else 
            {
            menuItems.style.maxHeight = "0px"
            }
        }
    </script>
