<?php //zapobieganie dostępowi do strony "użytkownicy.php" przez niezalogowanych użytkowników. 
session_start(); //Jeśli użytkownik jest już zalogowany, zostanie przekierowany bezpośrednio na stronę "użytkownicy.php", aby uniknąć konieczności ponownego logowania.
if(isset($_SESSION['id_unikalny'])){ //jeżeli istnieje zmienna sesyjna id_unikalny
    header("location: użytkownicy.php");
}
include_once "header.php";
?>
<body>
   <div class="wrap">
    <div class="formEntry register">
        <header>Komunikator</header>
        <form action="#" encypte="multipart/form-data">
            <div class="error"></div>
            <div class="personalData">
                <div class="field input">
                    <label>Imię</label>
                    <input type="text" name="imie" placeholder="Wprowadź swoje imię" required>
                </div>
                <div class="field input">
                    <label>Nazwisko</label>
                    <input type="text" name="nazwisko" placeholder="Wprowadź swoje nazwisko" required>
                </div>
                </div>
                <div class="field input">
                    <label>Adres email</label>
                    <input type="text" name="email" placeholder="Wprowadź adres email" required>
                </div>
                <div class="field input">
                    <label>Hasło</label>
                    <input type="password" name="haslo" placeholder="Wprowadź hasło" required>
                </div>
                <div class="field img">
                    <label>Wybierz zdjęcie profilowe</label>
                    <input type="file" name="zdjecie" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Rozpocznij rozmowę">
                </div>
        </form>

        <div class="link">Masz już konto?<a href="logowanie.php">Zaloguj się</a></div>

    </div>
   </div> 
   <script src="js/rejestracja.js"></script>
</body>
</html>