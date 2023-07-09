<?php
  while($wiersz=mysqli_fetch_assoc($sql)){
    $sql2= "SELECT * FROM wiadomosci WHERE (id_wiad_otrzymane = {$wiersz['id_unikalny']}
    OR id_wiad_wysylane = {$wiersz['id_unikalny']}) AND (id_wiad_wysylane = {$id_wysylane} 
    OR id_wiad_otrzymane = {$id_wysylane}) ORDER BY id_wiad DESC LIMIT 1";
    $sql3=mysqli_query($conn,$sql2);
    $wiersz2=mysqli_fetch_assoc($sql3);
    if(mysqli_num_rows($sql3)>0){
        $wynik=$wiersz2['wiad'];
    }else{
        $wynik="Nie ma dostępnej wiadomości";
    }
(strlen($wynik) >28) ? $wiad=substr($wynik, 0, 28).'...' : $wiad=$wynik;

$ty = (isset($wiersz2['id_wiad_wysylane']) && $id_wysylane == $wiersz2['id_wiad_wysylane']) ? 'Ty: ' : '';


($wiersz['status']=="Offline") ? $offline="offline" : $offline="";
    $output .='<a href="chatArea.php?id_uzytkownika='.$wiersz['id_unikalny'].'">
    <div class="content">
        <img src="php/zdjecia/'. $wiersz['zdj'] .'" alt="">
        <div class="specifics">
            <span>'. $wiersz['imie'] . " " . $wiersz['nazwisko'] .'</span>
            <p>' . $ty . $wiad . '</p>
        </div>
    </div>
    <div class="dot ' . $offline . '"><i class="fas fa-circle"></i></div>
</a>';
}


?>