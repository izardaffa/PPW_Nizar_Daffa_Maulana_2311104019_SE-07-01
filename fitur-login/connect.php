<?php

$host = "localhost";
$user = "root";
$pass = "240705";
$db   = "db_fitur_login";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
