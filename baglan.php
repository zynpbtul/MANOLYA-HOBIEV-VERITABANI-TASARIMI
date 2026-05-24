<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "manolya_hobievi";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>