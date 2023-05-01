<?php

include_once("dbeleres.php");


$UserName = $_POST['UserName'];
$UserPassword = $_POST['UserPassword'];
$UserPassword2 = $_POST['UserPassword2'];
$UserEmail = $_POST['UserEmail'];

$hashed_password = password_hash($UserPassword, PASSWORD_DEFAULT);


$kapcsolat = mysqli_connect($adatbazisIP, $adatbazisUserName, $adatbazisJelszo, $adatbazisNev);

if (!$kapcsolat) 
{
    echo "Nem sikerült a MySQL adatbázis vitashop adatbázishához csatlakozni.";
    exit;
} 
else 
{
    echo "Sikerült kapcsolódni a MySQL adatbázis vitashop adatbázisához.";
}

if ($UserPassword == $UserPassword2) 
{
    $parancs = "INSERT INTO users (UserID, UserName, UserPassword, UserEmail, UserType) VALUES (DEFAULT, '$UserName', '$hashed_password', '$UserEmail', '1');";
    $ertek = mysqli_query($kapcsolat, $parancs);

    if (!$ertek) 
    {
        echo "A regisztráció nem sikeres<br>.";
        echo mysqli_error($mysqli);
    } 
    else 
    {
        echo "Sikeres regisztráció<br>";
    }
} 
else
{
    echo "A jelszó és annak megerősítése nem eggyezik meg, kérem adjon meg egy új jelszót!";
}

?>