<?php
$conn=mysqli_connect("localhost", "root", "", "komunikator");
if(!$conn){
    echo "Baza rozłączona" .mysqli_connect_error();
}

?>