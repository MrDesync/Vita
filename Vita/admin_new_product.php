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
    <div class="txt-heading">Új termék feltöltése</div>

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


            <form method="post" action="product_new.php">

                <tr style="border: 1px solid #E0E0E0;">
                    <td><input type="text" class="product-quantity" name="ProductName" value="ProductName" size="25" />
                    </td>
                    <td><input type="text" class="product-quantity" name="ProductPhoto"
                            value="productIMG/ProductPhoto.jpg" size="25" /></td>
                    <td><input type="text" class="product-quantity" name="ProductCode" value="ProductCode" size="10" />
                    </td>
                    <td><textarea name="ProductDescription" class="product-quantity" cols="50"
                            rows="5">ProductDescription</textarea></td>
                    <td><input type="text" class="product-quantity" name="ProductPrice" value="ProductPrice"
                            size="10" /></td>
                    <td>
                        <select name="ProductCategory">
                            <option value="1" selected="selected">Vitamin</option>
                            <option value="2">Étrendkiegészítő</option>
                        </select>
                    </td>
                    <td>
                        <select name="ProductStatus">
                            <option value="1" selected="selected">Aktív</option>
                            <option value="0">Inaktív</option>
                        </select>
                    </td>

                    <td><button type="submit" class="btnAddAction">Mentés</button></td>

                </tr>
            </form>
            </td>

            <tr>

            </tr>
        </tbody>
    </table>

    <?php
    echo file_get_contents("footer.html");
    ?>

</body>

</html>