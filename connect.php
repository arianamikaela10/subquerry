<?php
//CREATE CONNECTION
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbbase = 'addbase_lab1';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbbase);
 
session_start();
?>