<?php
session_start();
include_once("dbeleres.php");


$UserName = $_POST['UserName'];
$UserPassword = $_POST['UserPassword'];

$kapcsolat = mysqli_connect($adatbazisIP, $adatbazisUserName, $adatbazisJelszo, $adatbazisNev);

if (!$kapcsolat) 
{
    echo "Nem sikerült a MySQL adatbázis vitashop adatbázishához csatlakozni.";
    exit;
} 
else 
{
    //echo "Sikerült kapcsolódni a MySQL adatbázis vitashop adatbázisához.";
}

//Lekérdezzük az UserID-t és UserType-ot a felhasználónév és jelszó alapján...
//TODO: ellenőrzés szükséges, hogy létezik-e a felhasználó+jelszó páros...

$parancs = mysqli_query($kapcsolat, "SELECT UserID, UserType, UserPassword FROM users WHERE UserName ='$UserName'");
$ertek = mysqli_fetch_assoc($parancs);

if (!$ertek) 
{
    echo "Sikertelen belépés!";
    exit;
} 

if (!password_verify($UserPassword, $ertek['UserPassword']))
        {
            echo "Sikertelen belépés!";
            exit;
        }

$_SESSION['UserID'] = $ertek['UserID'];
$_SESSION['UserType'] = $ertek['UserType'];

switch($ertek['UserType'])
{
case "99": 
    header("Location: admin.php");
    break;

case "1":
    header("Location: termekek.php");
    break;

case "5":
    echo " Sajnálom, de jelenleg ki vagy tiltva!";
    exit;
    break;

default:
    echo "Sikertelen belépés!";
    break;

}

?>