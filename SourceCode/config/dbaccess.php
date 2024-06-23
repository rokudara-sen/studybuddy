<?php
$host = "localhost";
$user = "management";
$password = "jNH(znv77KudP!ch";
$database = "studybuddy";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
