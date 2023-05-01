<?php

session_start();

require_once("dbcontroller.php");
include_once("dbeleres.php");
$db_handle = new DBController();

echo file_get_contents("header.html");

if (!isset($_SESSION["UserID"])) {
    header("Location: regisztracio.php"); //ha nincs bejelntkezve, akkor átirányítjuk a belépésre.
}
?>

<!DOCTYPE html>
<html lang="hu">

<body>

    <!--Termékek-->
    <br>
    <div class="txt-heading">Termékek szerkesztése</div>

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;" width="10%">Terméknév</th>
                <th style="text-align:left;" width="10%">Fotó</th>
                <th style="text-align:left;" width="5%">Cikkszám</th>
                <th style="text-align:left;" width="30%">Leírás</th>
                <th style="text-align:left;" width="5%">Egységár</th>
                <th style="text-align:left;" width="10%">Kategória</th>
                <th style="text-align:left;" width="5%">Státusz</th>
            </tr>


            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM products WHERE ProductCode = '" . $_GET['ProductCode'] . "'");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
                    ?>

                    <form method="post" action="product_muv.php?ProductID=<?php echo $product_array[$key]["ProductID"]; ?>">

                        <tr style="border: 1px solid #E0E0E0;">
                            <td><input type="text" class="product-quantity" name="ProductName"
                                    value="<?php echo $product_array[$key]["ProductName"]; ?>" size="25" /></td>
                            <td><input type="text" class="product-quantity" name="ProductPhoto"
                                    value="<?php echo $product_array[$key]["ProductPhoto"]; ?>" size="25" /></td>
                            <td><input type="text" class="product-quantity" name="ProductCode"
                                    value="<?php echo $product_array[$key]["ProductCode"]; ?>" size="10" /></td>
                            <td><textarea name="ProductDescription" class="product-quantity" cols="50"
                                    rows="5"><?php echo $product_array[$key]["ProductDescription"]; ?></textarea></td>
                            <td><input type="text" class="product-quantity" name="ProductPrice"
                                    value="<?php echo $product_array[$key]["ProductPrice"]; ?>" size="10" /></td>
                            <td>
                                <select name="ProductCategory">
                                    <option value="1" <?php if ($product_array[$key]["ProductCategory"] == '1')
                                        echo ' selected="selected"'; ?>>Vitamin</option>
                                    <option value="2" <?php if ($product_array[$key]["ProductCategory"] == '2')
                                        echo ' selected="selected"'; ?>>Étrendkiegészítő</option>
                                </select>
                            </td>
                            <td>
                                <select name="ProductStatus">
                                    <option value="1" <?php if ($product_array[$key]["ProductStatus"] == '1')
                                        echo ' selected="selected"'; ?>>Aktív</option>
                                    <option value="0" <?php if ($product_array[$key]["ProductStatus"] == '0')
                                        echo ' selected="selected"'; ?>>Inaktív</option>
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