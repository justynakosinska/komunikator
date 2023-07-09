<?php
session_start();
if(isset($_SESSION['id_unikalny'])){
    include_once "konfiguracja.php";
    $id_wysylane=$_SESSION['id_unikalny'];
    $id_otrzymane=mysqli_real_escape_string($conn,$_POST['id_otrzymane']);

    $output="";

    $sql= "SELECT * FROM wiadomosci LEFT JOIN  użytkownicy ON użytkownicy.id_unikalny=wiadomosci.id_wiad_wysylane WHERE (id_wiad_wysylane={$id_wysylane} AND id_wiad_otrzymane={$id_otrzymane})
    OR (id_wiad_wysylane={$id_otrzymane} AND id_wiad_otrzymane={$id_wysylane}) ORDER BY id_wiad";
    $sql2=mysqli_query($conn,$sql);
    if(mysqli_num_rows($sql2)>0){
        while($wiersz=mysqli_fetch_assoc($sql2)){
            if($wiersz['id_wiad_wysylane']=== $id_wysylane){
                $output .='<div class="chatmes sent">
                <div class="specifics">
                    <p>'. $wiersz['wiad'] .'</p>
                </div>
            </div>';
            }else{
                $output .='<div class="chatmes receive">
                <img src="php/zdjecia/'. $wiersz['zdj'] .'" alt="">
                <div class="specifics">
                    <p>'. $wiersz['wiad'] .'</p>
                </div>
            </div>';
            }
        }
    }else{
            $output .= '<div class="text">Nie ma dostępnych wiadomości</div>';
    }
    echo $output;
}else{
    header("location: ../login.php");
}
?>