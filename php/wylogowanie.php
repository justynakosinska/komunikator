<?php
session_start();
if(isset($_SESSION['id_unikalny'])){
    include_once "konfiguracja.php";
    
    $id_wylogowania = mysqli_real_escape_string($conn, $_GET['id_wylogowania']);
    
    if(isset($id_wylogowania)){
        $status = "Offline";
        $sql = "UPDATE użytkownicy SET status = '{$status}' WHERE id_unikalny = {$id_wylogowania}";
        
        if(mysqli_query($conn, $sql)){
            session_unset();
            session_destroy();
            header("location: ../logowanie.php");
            exit();
        } else {
            // Obsługa błędu
            echo "Wystąpił błąd podczas aktualizacji statusu.";
            exit();
        }
    } else {
        header("location: ../użytkownicy.php");
        exit();
    }
} else {
    header("location: ../logowanie.php");
    exit();
}
?>