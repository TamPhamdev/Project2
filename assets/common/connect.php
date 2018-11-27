

<?php

$connect = new PDO('mysql:host=localhost;dbname=ahihishop', 'root', '');
session_start();
$server = "localhost";
$uid = "root";
$pwd = "";
$db = "ahihishop";
$cn = mysqli_connect($server, $uid, $pwd, $db);
if (mysqli_connect_error()) {
    die("Not connect");
}
?>
