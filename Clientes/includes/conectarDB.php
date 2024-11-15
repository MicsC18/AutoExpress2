<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "autoexpress";


$conn = new PDO("mysql:host=" . $servername . ";dbname=" . $db . ";charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>