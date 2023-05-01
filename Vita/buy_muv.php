<?php

include_once("dbeleres.php");

$kapcsolat = mysqli_connect($adatbazisIP, $adatbazisUserName, $adatbazisJelszo, $adatbazisNev);

if (!$kapcsolat)
{
    echo "Nem sikerült a MySQL adatbázis vitashop adatbázishához csatlakozni.";
    exit;
} 
else 
{
    //sikeres kapcsolat, termék elmentése a purchases táblába

    $timestamp = date('Y-m-d H:i:s');

    $parancs = "INSERT INTO purchases (PurchaseNumber, UserID, ProductID, ProductPrice, ProductQuantity, PurchaseDate) VALUES (" . $_SESSION['PurchaseNumber'] . ", " . $_SESSION['UserID'] . ", " . $item["ProductID"] . ", " . $item["ProductPrice"] . ", " . $item["quantity"] . ", '" . $timestamp . "')";

    $ertek = mysqli_query($kapcsolat, $parancs);

    if (!$ertek)
    {
        echo "A terméke elmentése nem sikeres<br>.";
        echo mysqli_error($mysqli);
        exit;
    } 
    else
    {
        //echo "Sikeres termék elmentés<br>";
    }

}
?>