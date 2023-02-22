<?php
// HEADER 
header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');


include '../db-con.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['cat_id'];

$sql = $con->prepare("SELECT * FROM products WHERE cat_id=?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();
$array = [];
while ($row = $result->fetch_assoc()) {
  $array[] = $row;
}

echo json_encode($array);

