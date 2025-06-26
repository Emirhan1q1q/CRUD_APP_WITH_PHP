<?php 
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "crud_operation");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Hata kontrolü
if (!$connection) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}
?>
