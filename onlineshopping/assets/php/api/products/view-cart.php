<?php
include '../db-con.php';
$sql = " SELECT * FROM cart ";
$result = $con->query($sql);
//sum
$sql1 = "SELECT sum(current_price) from cart";
$q = mysqli_query($con, $sql1);
$row = mysqli_fetch_array($q);
//count
$sqlcount = "SELECT count(product_id) from cart";
$sc = mysqli_query($con, $sqlcount);
$rowsc = mysqli_fetch_array($sc);


$con->close();
?>

<!doctype html>
<html lang="en">

<head>
  <title>cart</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="./style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
  <link rel="stylesheet" href="/onlineshopping/assets/css/cart-style.css">
</head>

<body>
  <div class="CartContainer">
    <div class="Header">
      <h3 class="Heading">Shopping Cart</h3>
      <a href="del-cart.php">
      <h5 class="Action">Remove all</h5>
      </a>

    </div>
    <?php
      while($rows=$result->fetch_assoc())
      {
    ?>
    <div class="Cart-Items">
      <div class="about">
        <h1 class="title"><?php echo $rows['product_name'];?></h1>
      </div>
      <div class="counter">
        <button class="btn" onclick="increment()">+</button>
        <div class="count" id="counting"></div>
        <button class="btn" onclick="decrement()">-</button>
      </div>
      <div class="prices">
        <div class="amount">$<?php echo $rows['current_price'];?></div>
      </div>
    </div>
    <?php
      }
    ?>
    <hr>
    <div class="checkout">
      <div class="total">
        <div>
          <div class="Subtotal">Sub-Total</div>
          <div class="items">Total items:<?php echo $rowsc[0]; ?></div>
        </div>
        <div class="total-amount">$<?php echo $row[0]; ?></div>
      </div>
      <button onclick="checkout()" class="button">Checkout</button>
    </div>
  </div>

  <script>
    var data = 0;
    document.getElementById("counting").innerText = data;

    function increment() {
        data = data + 1;
        document.getElementById("counting").innerText = data;
    }
    function decrement() {
        data = data - 1;
        document.getElementById("counting").innerText = data;
    }

    function checkout(){
      alert("Order placed");
    }
  </script>















  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>


</body>

</html>