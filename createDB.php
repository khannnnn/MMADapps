<?php
require 'control.php';
$obj = new Control();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mmadDB';
$obj->createDataBase($servername, $username, $password, $dbname);
?>