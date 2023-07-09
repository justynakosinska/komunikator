<?php
session_start();
include_once "konfiguracja.php";
$imie=mysqli_real_escape_string($conn, $_POST['imie']);
$nazwisko=mysqli_real_escape_string($conn, $_POST['nazwisko']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$haslo=mysqli_real_escape_string($conn, $_POST['haslo']);

if(!empty($imie) && !empty($nazwisko) && !empty($email) && !empty($haslo)){
    //walidacja adresu email, czy już istnieje w bazie czy nie
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //funkcja sprawdza czy wartość pod zmienną $email jest poprawna
        //sprawdzenie czy email istnieje w bazie danych
        $sql=mysqli_query($conn, "SELECT email FROM użytkownicy WHERE email = '{$email}'");
        if(mysqli_num_rows($sql)>0){// jeżeli adres istnieje
            echo "Konto pod tym adresem już istnieje";
        }else{
            //sprawdzenie załadowanego pliku
            if(isset($_FILES['zdjecie'])){ //jeżeli plik jest załadowany to $_FILES[] (superglobalna tablica) zwraca tablicę z nazwą, typem, błędem, rozmiarem, nazwą tymczasową
                $nazwa_zdj=$_FILES['zdjecie']['name'];//pobranie nazwy załadowanego zdjęcia
                $tymczasowa_nazwa=$_FILES['zdjecie']['tmp_name'];//tymczasowa nazwa będzie potrzebna do przechowania zdjęcia w folderze
                //wyodrębnienie z nazwy przesłanego pliku nazwy i rozszerzenia osobno
                $zdj_explode=explode('.',$nazwa_zdj);//funkcja explode() to tablica która przechowuje części nazwy jako elementy tablicy
                $rozszerzenie=end($zdj_explode);//rozszerzenie przesłąnego pliku

                $rozszerzenia=['png','jpeg','jpg']; //tablica rozszerzeń które będą uwzględniane przy przesłanym pliku

                if(in_array($rozszerzenie, $rozszerzenia) ===true){//sprawdzenie czy rozszerzenie przesłanego pliku zgadza się z rozszerzeniem w tablicy
                    $czas=time();//zwróci obecny czas



                    $nowa_nazwa_zdj=$czas.$nazwa_zdj;//połączenie nazwy z czasem
                    if(move_uploaded_file($tymczasowa_nazwa, "zdjecia/".$nowa_nazwa_zdj)){ //jeżeli zdjęcie zostanie przeniesione do folderu poprawnie
                        $status="Online"; //jak wszytskie ifbędą na true to użytkownik poprawnie zostanie zarejestrowany i status zmieni się na online
                        $losowe_id=rand(time(), 10000000); //unikalny id_użytkownika
                        //wprowadzenie wszystkich danych do tabeli w bd
                        $sql2=mysqli_query($conn,"INSERT INTO użytkownicy (id_unikalny, imie, nazwisko, email, haslo, zdj, status)
                                            VALUES ({$losowe_id},'{$imie}','{$nazwisko}','{$email}','{$haslo}','{$nowa_nazwa_zdj}','{$status}')");
                        if($sql2){ //jeżeli dane są wprowadzone
                            $sql3=mysqli_query($conn, "SELECT * FROM użytkownicy WHERE email='{$email}'");//wybierz wszystkie wprowadzone dane pod adresem email
                            if(mysqli_num_rows($sql3)>0){
                                $wiersz=mysqli_fetch_assoc($sql3);//pobiera wiersz z danymi i zapisuje jako tablicę asocjacyjną
                                $_SESSION['id_unikaly']=$wiersz['id_unikalny'];//podczas używania tej sesji używamy unikalnego id w każdym pliku php
                                echo "success";
                            }
                        
                        }else{
                            echo "coś poszło nie tak";
                        }
                    }
                }else{
                    echo "Wybierz plik z rozszerzeniem: jpg, jpeg, png";
                }
            
            }else{
                echo "Wybierz plik ze zdjęciem";
            }
        }
    
    }else{
        echo "To nie jest poprawny email";
    }
}else{
    echo "Wszystkie pola są wymagane";
}
?>