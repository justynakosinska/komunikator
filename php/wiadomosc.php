<?php
session_start();
if(isset($_SESSION['id_unikalny'])){
    include_once "konfiguracja.php";

    $id_wysylane = $_SESSION['id_unikalny'];
    $id_otrzymane = mysqli_real_escape_string($conn, $_POST['id_otrzymane']);
    $wiad = mysqli_real_escape_string($conn, $_POST['wiad']);

    if(!empty($wiad)){
        $sql = "INSERT INTO wiadomosci (id_wiad_otrzymane, id_wiad_wysylane, wiad)
                VALUES ({$id_otrzymane}, {$id_wysylane}, '{$wiad}')";

        if(mysqli_query($conn, $sql)){
            // Pomyślnie dodano wiadomość
        } else {
            // Obsługa błędu
            echo "Wystąpił błąd podczas dodawania wiadomości.";
        }
    }
} else {
    header("location: ../logowanie.php");
    exit();
}
?>