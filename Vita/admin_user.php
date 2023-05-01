<?php

session_start();

require_once("dbcontroller.php");
include_once("dbeleres.php");
$db_handle = new DBController();

echo file_get_contents("header.html");

if (!isset($_SESSION["UserID"])) 
{
    header("Location: regisztracio.php"); //ha nincs bejelntkezve, akkor átirányítjuk a belépésre.
}
?>

<!DOCTYPE html>
<html lang="hu">

<body>

    <!--Felhasználók-->
    <br>
    <div class="txt-heading">Felhasználók szerkesztése</div>

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;" width="10%">Név</th>
                <th style="text-align:left;" width="10%">Email</th>
                <th style="text-align:left;" width="10%">Jogosultság</th>
            </tr>
            <?php
            $user_array = $db_handle->runQuery("SELECT * FROM Users WHERE UserID = " . $_GET['UserID'] . "");
            if (!empty($user_array)) 
            {
                foreach ($user_array as $key => $value) 
                {
                    ?>
                    <form method="post" action="user_muv.php?UserID=<?php echo $user_array[$key]["UserID"]; ?>">

                        <tr style="border: 1px solid #E0E0E0;">
                            <td><input type="text" class="product-quantity" name="UserName"
                                    value="<?php echo $user_array[$key]["UserName"]; ?>" size="25" /></td>
                            <td><input type="text" class="product-quantity" name="UserEmail"
                                    value="<?php echo $user_array[$key]["UserEmail"]; ?>" size="25" /></td>
                            <td>
                                <select name="UserType">
                                    <option value="1" <?php if ($user_array[$key]["UserType"] == '1')
                                        echo ' selected="selected"'; ?>>Felhasználó</option>
                                    <option value="99" <?php if ($user_array[$key]["UserType"] == '99')
                                        echo ' selected="selected"'; ?>>Admin</option>
                                    <option value="5" <?php if ($user_array[$key]["UserType"] == '5')
                                        echo ' selected="selected"'; ?>>Kitiltott</option>
                                </select>
                            </td>

                            <td><button type="submit" class="btnAddAction">Mentés</button></td>
                        </tr>
                    </form>
                    </td>

                    <?php
                }
            }
            ?>
            <tr>

            </tr>
        </tbody>
    </table>



    <?php
    echo file_get_contents("footer.html");
    ?>

</body>

</html>