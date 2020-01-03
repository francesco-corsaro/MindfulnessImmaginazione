<?php
$servername = "localhost";
$username = "mbsr";
$password ='' ;
$dbname = "my_mbsr";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    echo "Connesso".'  ';}

 ?>














