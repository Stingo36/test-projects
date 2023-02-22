<?php
header('Content-type: application/json'); 
header('Access-Control-Allow-Origin:*');  
header('Access-Control-Allow-Methods:POST'); 
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods, Authorization,X-Requested-With');

include '../db-con.php';
$data = json_decode(file_get_contents("php://input"), true); 

$product_id = $data['product_id'];
$product_name = $data['product_name'];
$product_price = $data['product_price'];
$sql = $con->prepare("INSERT INTO cart (cart_id,product_id,product_name, current_price) VALUES(?,?,?,?)");
  $sql->bind_param("iisi",$cart_id, $product_id,$product_name, $product_price);
  $result1 = $sql->execute();
  if ($result1) {
    echo "<script>alert('Sucessfully Registered')</script>";
    echo json_encode(array('message' => 'Record Inserted', 'status' => true));
  } else {
    echo "<script>alert('Error')</script>";
    echo json_encode(array('message' => 'no Record Inserted', 'status' => false));
  }