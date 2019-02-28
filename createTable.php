<?php
require 'control.php';
$obj = new Control();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mmadDB';
$tablename = 'employee';

$obj->createTable($servername, $username, $password, $dbname, $tablename);
?>