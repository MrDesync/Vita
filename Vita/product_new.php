<?php

/*
TODO 

*/


include_once("dbeleres.php");

$ProductName = $_POST['ProductName'];
$ProductPhoto = $_POST['ProductPhoto'];
$ProductCode = $_POST['ProductCode'];
$ProductDescription = $_POST['ProductDescription'];
$ProductPrice = $_POST['ProductPrice'];
$ProductCategory = $_POST['ProductCategory'];
$ProductStatus = $_POST['ProductStatus'];

$kapcsolat = mysqli_connect($adatbazisIP, $adatbazisUserName, $adatbazisJelszo, $adatbazisNev);

if (!$kapcsolat) {
    echo "Nem sikerült a MySQL adatbázis vitashop adatbázishához csatlakozni.";
    exit;
}


//TODO ProductCode-t ellenőrizni, nem lehet két ugyanolyan....

$parancs = "INSERT INTO products (ProductID, ProductName, ProductPhoto, ProductCode, ProductDescription, ProductPrice, ProductCategory, ProductStatus) VALUES (DEFAULT, '$ProductName', '$ProductPhoto', '$ProductCode', '$ProductDescription', '$ProductPrice', '$ProductCategory', '$ProductStatus')";
$ertek = mysqli_query($kapcsolat, $parancs);

if (!$ertek) {
    echo "A termék elmentése nem sikeres<br>.";
    echo mysqli_error($mysqli);
    exit;
}

header("Location: admin.php");

?>