
<?php //zapobieganie dostępowi do strony "użytkownicy.php" przez niezalogowanych użytkowników. 
session_start();//Jeśli użytkownik nie jest zalogowany bo zmienna sesyjna nie jest ustawiona na id to wtedy użytkownik jest przekierowywany na stronę logowania
include_once "php/konfiguracja.php";
if(!isset($_SESSION['id_unikalny'])){
    header("location: logowanie.php");
}
include_once "header.php";
$sql=mysqli_query($conn, "SELECT * FROM użytkownicy WHERE id_unikalny={$_SESSION['id_unikalny']}");
if(mysqli_num_rows($sql)>0){
    $wiersz=mysqli_fetch_assoc($sql);//zmienna wiersz przechowuje dane pierwszego wiersza z wyniku zapytania w tablicy asocjacyjnej
}
//dane z wiersza będą wykorzystane by uzupełnić dane użytkownika zalogowanego
?>
<body>
   <div class="wrap">
    <div class="accounts">
       <header>
       <div class="content">
            <img src="php/zdjecia/<?php echo $wiersz['zdj']?>" alt=""> 
            <div class="specifics">
                <span><?php echo $wiersz['imie'] . " " . $wiersz['nazwisko'] ?></span>
                <p><?php echo $wiersz['status']?></p>
            </div>
        </div>
        <a href="php/wylogowanie.php?id_wylogowania=<?php echo $wiersz['id_unikalny'] ?>" class="logoutLink">Wyloguj się</a>
       </header>
       <div class="searchBar">
       <span class="text">Wybierz użytkownika by rozpocząć konwersację</span>
        <input type="text" placeholder="Wyszukaj użytkownika">
        <button><i class="fas fa-search"></i></button>
       </div>
       <div class="listOfAccounts">
        
       
       </div>
    </div>
   </div> 
   <script src="js/użytkownicy.js"></script>
</body>
</html>