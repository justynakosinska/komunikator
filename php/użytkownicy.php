<?php
session_start();
include_once "konfiguracja.php";
$id_wysylane=$_SESSION['id_unikalny'];
$sql=mysqli_query($conn, "SELECT * FROM użytkownicy WHERE NOT id_unikalny={$id_wysylane}");
$output="";

if(mysqli_num_rows($sql)==0){
    $output .="Nie ma użytkowników do rozmowy";
}elseif(mysqli_num_rows($sql)>0){
  include_once "dane.php";
}
echo $output;
?>