<?php
include "db_connect.php";

if(!isset($_GET['id']) or $_GET['id'] < 0 or $_GET['id'] == ""){
    header("Location: home.php");
}

$id = $_GET['id'];
mysqli_query($conn, "delete from tb_data_penduduk where nik='$id'");
header("Location: home.php?page=penduduk");
?>