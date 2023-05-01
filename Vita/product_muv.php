<?php

/*
TODO 
Email formátum 
Usernév és email nem szerepelhet 2x az db-ben. ell!     
*/


include_once("dbeleres.php");

$ProductID = $_GET['ProductID'];
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

$parancs = "UPDATE products SET ProductName='$ProductName', ProductPhoto='$ProductPhoto', ProductCode='$ProductCode', ProductDescription='$ProductDescription', ProductPrice='$ProductPrice', ProductCategory='$ProductCategory', ProductStatus='$ProductStatus' WHERE ProductID='$ProductID'";
$ertek = mysqli_query($kapcsolat, $parancs);

if (!$ertek) {
    echo "A regisztráció nem sikeres<br>.";
    echo mysqli_error($mysqli);
}

header("Location: admin.php");

?>