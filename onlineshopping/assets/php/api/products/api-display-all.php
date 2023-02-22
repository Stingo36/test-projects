<?php
// HEADER 
header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');


include '../db-con.php';

$sql = $con->prepare("SELECT * FROM products ORDER BY RAND ()" );
$sql->execute();
$result = $sql->get_result();
$array = [];
while ($row = $result->fetch_assoc()) {
  $array[] = $row;
}

echo json_encode($array);
