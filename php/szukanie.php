<?php
session_start();
include_once "konfiguracja.php";
$id_wysylane=$_SESSION['id_unikalny'];
$szukanyUżytkownik=mysqli_real_escape_string($conn, $_POST['szukanyUżytkownik']);
$output="";

$sql=mysqli_query($conn, "SELECT * FROM użytkownicy WHERE NOT id_unikalny={$id_wysylane} AND (imie LIKE '%{$szukanyUżytkownik}%' OR nazwisko LIKE '%{$szukanyUżytkownik}%')");
if(mysqli_num_rows($sql)>0){
    include "dane.php";
}else{
    $output .="Nie znaleziono takiego użytkownika";

}

echo $output;


?>