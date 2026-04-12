<?php
/* SERBIDEREA
$host = "192.168.115.159";
$user = "admin";
$pass = "1MG32025";
$db = "3erronka";
*/
$host = "localhost";
$user = "root";
$pass = "1MG32025";
$db = "3erronka";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Errorea konexioan: " . $conn->connect_error);
}
?>