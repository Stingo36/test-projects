<?php
// HEADER 
header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');


include '../db-con.php';
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['product_id'];

$sql = $con->prepare("SELECT * FROM products WHERE product_id=?");
$sql->bind_param('i', $id);
$sql->execute();
$result = $sql->get_result();
$array = [];

$array_product_id = '';
$array_product_name = '';
$array_product_price = '';
while ($row = $result->fetch_assoc()) {
  $array_product_id = $row['product_id'];
  $array_product_name = $row['product_name'];
  $array_product_price = $row['current_price'];
}

$sql = $con->prepare("INSERT INTO cart (cart_id,product_id,product_name, current_price) VALUES(?,?,?,?)");
  $sql->bind_param("iisi",$cart_id, $array_product_id,$array_product_name, $array_product_price);
  $result1 = $sql->execute();
  if ($result1) {
    echo "<script>alert('Sucessfully Registered')</script>";
    echo json_encode(array('message' => 'Record Inserted', 'status' => true));
  } else {
    echo "<script>alert('Error')</script>";
    echo json_encode(array('message' => 'no Record Inserted', 'status' => false));
  }






echo json_encode($array);
