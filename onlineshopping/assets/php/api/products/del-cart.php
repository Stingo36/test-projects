<?php
include '../db-con.php';
$sql = " DELETE FROM cart ";
$result = $con->query($sql);
header("location: http://localhost/onlineshopping/assets/html/home.php");
$con->close();
?>