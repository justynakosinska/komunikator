<?php 
session_start();
include_once "php/konfiguracja.php";
if(!isset($_SESSION['id_unikalny'])){
    header("location: logowanie.php");
}
include_once "header.php";
$id_użytkownika=mysqli_real_escape_string($conn, $_GET['id_uzytkownika']); //wartość $_GET['id_uzytkownika'] jest escapowana i bezpieczna do użycia w zapytaniu SQL
$sql=mysqli_query($conn, "SELECT * FROM użytkownicy WHERE id_unikalny={$id_użytkownika}");
if(mysqli_num_rows($sql)>0){
    $wiersz=mysqli_fetch_assoc($sql);
}else{
    header("location: użytkownicy.php");
}
?>
<body>
   <div class="wrap">
    <div class="chat">
       <header>
            <a href="użytkownicy.php" class="backArrow"><i class="fas fa-arrow-left"></i></a>
            <img src="php/zdjecia/<?php echo $wiersz['zdj']?>" alt="">
            <div class="specifics">
                <span><?php echo $wiersz['imie'] . " " . $wiersz['nazwisko'] ?></span>
                <p><?php echo $wiersz['status']?></p>
            </div>
        </div>
       </header>
       <div class="chatArea">
       
       </div>
       <form action="#" class="writeames">
        <input type="text" class="id_otrzymane"name="id_otrzymane" value="<?php echo $id_użytkownika;  ?>" hidden>
        <input type="text" name="wiad" class="input" placeholder="Napisz wiadomość tutaj..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
       </form>
    </div>
   </div> 
   <script src="js/konwersacja.js"></script>
</body>
</html>