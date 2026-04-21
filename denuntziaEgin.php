<?php
session_start();
require 'konexioa.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

}
$stmt = $conn->prepare("UPDATE iritziak SET denuntzia=denuntzia+1 WHERE id=?");
$stmt->bind_param("s", $_POST["denuntzia"]);
$stmt->execute();

header("Location: jokuespezifikoa.php");
exit;
?>