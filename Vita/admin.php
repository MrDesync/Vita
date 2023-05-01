<?php

session_start();

require_once("dbcontroller.php");
include_once("dbeleres.php");
$db_handle = new DBController();

echo file_get_contents("header.html");

//ha nincs belépve akkor irány a regisztrációs oldal
if (!isset($_SESSION["UserID"])) 
{
    header("Location: regisztracio.php"); //ha nincs bejelntkezve, akkor átirányítjuk a belépésre.
}

//ha nem Admin akkor irány a termékek oldal
if (isset($_SESSION["UserType"])!=99) 
{
    header("Location: termekek.php"); //ha nincs bejelntkezve, akkor átirányítjuk a belépésre.
}
?>

<!DOCTYPE html>
<html lang="hu">

<body>
    <br>
    <div class="txt-heading">Termékek szerkesztése
        <a id="btnBuy" href="admin_new_product.php">Új termék feltöltése</a>
    </div>

    <!--Termékek-->
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;" width="10%">Név</th>
                <th style="text-align:left;">Leírás</th>
                <th style="text-align:left;" width="5%">Cikkszám</th>
                <th style="text-align:left;" width="5%">Egységár</th>
                <th style="text-align:left;" width="5%">Kategória</th>
                <th style="text-align:left;" width="5%">Státusz</th>
                <th style="text-align:center;" width="5%">Szerkesztés</th>
            </tr>
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM Products ORDER BY ProductID ASC");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
                    ?>
                    <tr style="border: 1px solid #E0E0E0;">
                        <td><img src="<?php echo $product_array[$key]["ProductPhoto"]; ?>" class="cart-item-image" /><a
                                href="admin_product.php?ProductCode=<?php echo $product_array[$key]["ProductCode"]; ?>"
                                class="btnRemoveAction"><?php echo $product_array[$key]["ProductName"]; ?></a>
                        </td>
                        <td>
                            <?php echo $product_array[$key]["ProductDescription"]; ?>
                        </td>
                        <td>
                            <?php echo $product_array[$key]["ProductCode"]; ?>
                        </td>
                        <td>
                            <?php echo $product_array[$key]["ProductPrice"]; ?>
                        </td>

                        <?php
                        switch ($product_array[$key]["ProductCategory"]) {
                            case "1":
                                ?>
                                <td>Vitamin</td>
                                <?php
                                break;
                            case "2":
                                ?>
                                <td>Étrendkiegészítő</td>
                                <?php
                                break;
                            default:
                                ?>
                                <td>
                                    <?php echo "Ismereletlen típus: " . $product_array[$key]["ProductCategory"]; ?>
                                </td>
                            <?php
                        }
                        ?>

                        <?php
                        switch ($product_array[$key]["ProductStatus"]) {
                            case "1":
                                ?>
                                <td>Aktív</td>
                                <?php
                                break;
                            case "0":
                                ?>
                                <td>Inaktív</td>
                                <?php
                                break;
                            default:
                                ?>
                                <td>
                                    <?php echo "Ismereletlen típus: " . $user_array[$key]["ProductStatus"]; ?>
                                </td>
                            <?php
                        }
                        ?>

                        <td style="text-align:center;"><a
                                href="admin_product.php?ProductCode=<?php echo $product_array[$key]["ProductCode"]; ?>"
                                class="btnRemoveAction"><img src="icon-edit.png" alt="Remove Item" /></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
            </tr>
        </tbody>
    </table>

    <!--Felhasználók-->
    <br>
    <div class="txt-heading">Felhasználók szerkesztése</div>

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;" width="10%">Név</th>
                <th style="text-align:left;" width="10%">Email</th>
                <th style="text-align:left;" width="10%">Jogosultság</th>
                <th style="text-align:center;" width="5%">Szerkesztés</th>
            </tr>
            <?php
            $user_array = $db_handle->runQuery("SELECT * FROM Users ORDER BY UserID ASC");
            if (!empty($user_array)) {
                foreach ($user_array as $key => $value) {
                    ?>
                    <tr style="border: 1px solid #E0E0E0;">
                        <td><a href="admin_user.php?UserID=<?php echo $user_array[$key]["UserID"]; ?>"
                                class="btnRemoveAction"><?php echo $user_array[$key]["UserName"]; ?></a></td>
                        <td>
                            <?php echo $user_array[$key]["UserEmail"]; ?>
                        </td>

                        <?php
                        switch ($user_array[$key]["UserType"]) {
                            case "1":
                                ?>
                                <td>Felhasználó</td>
                                <?php
                                break;
                            case "0":
                                ?>
                                <td>Kitiltott</td>
                                <?php
                                break;
                            case "99":
                                ?>
                                <td>Admin</td>
                                <?php
                                break;
                            default:
                                ?>
                                <td>
                                    <?php echo "Ismereletlen típus: " . $user_array[$key]["UserType"]; ?>
                                </td>
                            <?php
                        }
                        ?>

                        <td style="text-align:center;"><a
                                href="admin_user.php?UserID=<?php echo $user_array[$key]["UserID"]; ?>"
                                class="btnRemoveAction"><img src="icon-edit.png" alt="Edit" /></a></td>
                    </tr>
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