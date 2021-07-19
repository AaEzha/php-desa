<?php
session_start();
$host= "localhost";
$username= "root";
$password = "";
$database = "db_admdesa";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
	echo "Connection failed";
}
