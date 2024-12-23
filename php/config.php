<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "telezap";

// Estabelecer a conexão com o banco de dados usando mysqli
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
