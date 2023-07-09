<?php
session_start();
include_once "konfiguracja.php";

$email=mysqli_real_escape_string($conn, $_POST['email']);
$haslo=mysqli_real_escape_string($conn, $_POST['haslo']);

if(!empty($email) && !empty($haslo)){
    $sql=mysqli_query($conn, "SELECT * FROM użytkownicy WHERE email = '{$email}' AND haslo='{$haslo}'");
    if(mysqli_num_rows($sql)>0){
        $wiersz=mysqli_fetch_assoc($sql);
        $status="Online";
        $sql2=mysqli_query($conn, "UPDATE użytkownicy SET status='{$status}' WHERE id_unikalny={$wiersz['id_unikalny']}");
        if($sql2){
            $_SESSION['id_unikalny']=$wiersz['id_unikalny'];
            echo "success";    
        }else{
            echo "Coś poszło nie tak";
        }

    }else{
        echo "Email lub hasło są nieprawidłowe!";
    }
}else{
    echo "Wszystkie pola są obowiązkowe";
}
?>