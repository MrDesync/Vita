<?php

/*
TODO 
Email formátum 
Usernév és email nem szerepelhet 2x az db-ben. ell!     
*/


include_once("dbeleres.php");

$UserName = $_POST['UserName'];
$UserEmail = $_POST['UserEmail'];
$UserID = $_GET['UserID'];
$UserType = $_POST['UserType'];

$kapcsolat = mysqli_connect($adatbazisIP, $adatbazisUserName, $adatbazisJelszo, $adatbazisNev);

if (!$kapcsolat) {
    echo "Nem sikerült a MySQL adatbázis vitashop adatbázishához csatlakozni.";
    exit;
}

/*
echo $UserID;
echo $UserName;
echo $UserEmail;
echo $UserType;
*/


$parancs = "UPDATE users SET UserName='$UserName', UserEmail='$UserEmail', UserType='$UserType' WHERE UserID='$UserID'";
$ertek = mysqli_query($kapcsolat, $parancs);

if (!$ertek) {
    echo "A regisztráció nem sikeres<br>.";
    echo mysqli_error($mysqli);
}

header("Location: admin.php");

?>