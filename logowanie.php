<?php  //zapobieganie dostępowi do strony "użytkownicy.php" przez niezalogowanych użytkowników. 
session_start();//Jeśli użytkownik jest już zalogowany, zostanie przekierowany bezpośrednio na stronę "użytkownicy.php", aby uniknąć konieczności ponownego logowania.
if(isset($_SESSION['id_unikalny'])){
    header("location: użytkownicy.php");
}
include_once "header.php";
?>

<body>
   <div class="wrap">
    <div class="formEntry login">
        <header>Komunikator</header>
        <form action="#" encypte="multipart/form-data">
            <div class="error"></div>
                <div class="field input">
                    <label>Adres email</label>
                    <input type="text" name="email" placeholder="Wprowadź adres email">
                </div>
                <div class="field input">
                    <label>Hasło</label>
                    <input type="password" name="haslo" placeholder="Wprowadź hasło">
                </div>
                <div class="field button">
                    <input type="submit" value="Rozpocznij rozmowę">
                </div>
        </form>

        <div class="link">Nie masz konta?<a href="index.php">Zarejestruj się</a></div>

    </div>
   </div> 
   <script src="js/logowanie.js"></script>
</body>
</html>