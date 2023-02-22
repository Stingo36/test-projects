
<?php
  session_start();
  $a = $_SESSION['fname'];
   
?>
<!doctype html>
<html lang="en">

<head>
  <title>Product Details </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
  <link rel="stylesheet" href="/onlineshopping/assets/css/styles.css">
</head>

<body style="background-color: #eee;">
<header class="p-3 text-bg-dark">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">New</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)">Contact Us</a>
            </li>
            <li class="nav-item">
              <h6 class="m-2 p-1"> Welcome : <?php echo $a ?> </h6>
            </li>
          </ul>
          
          <a href="../php/api/products/view-cart.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart m-2"
              viewBox="0 0 16 16">
              <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
          </a>
          <a href="logout.php" class="btn btn-info btn-md m-2">
            <span class="glyphicon glyphicon-log-out"></span> Log out
          </a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="card">
        <div class="container-fliud">
          <div class="wrapper row">
            <div class="preview col-md-6">
              <div class="preview-pic tab-content">
                <div class="tab-pane active text-center" id="pic-1"><img
                    src='/onlineshopping/assets/images/dummy-img.png' class='w-50 ' alt='dummy img' /> </div>
                <div class="tab-pane" id="pic-2"><img src='/onlineshopping/assets/images/dummy-img.png' class='w-50'
                    alt='dummy img' /></div>
                <div class="tab-pane" id="pic-2"><img src='/onlineshopping/assets/images/dummy-img.png' class='w-50'
                    alt='dummy img' /></div>
                <div class="tab-pane" id="pic-2"><img src='/onlineshopping/assets/images/dummy-img.png' class='w-50'
                    alt='dummy img' /></div>
                <div class="tab-pane" id="pic-2"><img src='/onlineshopping/assets/images/dummy-img.png' class='w-50'
                    alt='dummy img' /></div>
              </div>
              <ul class="preview-thumbnail nav nav-tabs">
                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                      src='/onlineshopping/assets/images/dummy-img.png' /></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img
                      src='/onlineshopping/assets/images/dummy-img.png' /></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img
                      src='/onlineshopping/assets/images/dummy-img.png' /></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img
                      src='/onlineshopping/assets/images/dummy-img.png' /></a></li>
                <li><a data-target="#pic-2" data-toggle="tab"><img
                      src='/onlineshopping/assets/images/dummy-img.png' /></a></li>
              </ul>

            </div>
            <div class="details col-md-6">
              <h3 class="product-title" id="product_name"></h3>
              <div class="rating">
                <div class="stars">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
                <span class="review-no">41 reviews</span>
              </div>
              <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem
                sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
              <h4 class="price m-0">Current Price:<span id="current_price"></span></h4>
              <span class='text-danger'>Original Price:<s id="raw_price"></s></span>

              <p class="vote"><strong id="discount"></strong> of buyers enjoyed this product! <strong>(87
                  votes)</strong></p>
              <h5 class="sizes">sizes:
                <span class="size" data-toggle="tooltip" title="small">s</span>
                <span class="size" data-toggle="tooltip" title="medium">m</span>
                <span class="size" data-toggle="tooltip" title="large">l</span>
                <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
              </h5>
              <h5 class="colors">colors:
                <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                <span class="color green"></span>
                <span class="color blue"></span>
              </h5>
              <div class="action">
                <button class="add-to-cart btn btn-default" type="button" onclick="pageRedirect()">Go Back</button>
                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="a">
      <h1 class="w" id="w"></h1>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

  <Script>
  $(document).ready(function() {
    // FETCH ALL

    jsarray = JSON.parse(localStorage.getItem("jsArray"));
    console.log(jsarray);
    var product_id = jsarray[0]['product_id'];
    product_name = jsarray[0]['product_name'];
    current_price = jsarray[0]['current_price'];
    raw_price = jsarray[0]['raw_price'];
    discount = jsarray[0]['discount'];
    document.getElementById('product_name').innerHTML = product_name;
    document.getElementById('current_price').innerHTML = current_price;
    document.getElementById('raw_price').innerHTML = raw_price;
    document.getElementById('discount').innerHTML = discount;
  });

  function pageRedirect() {
    localStorage.clear();
    window.location.href = "http://localhost/onlineshopping/assets/html/home.php";
    console.log("dsadasd");
  }

  //cart
  $(document).on("click", ".edit-btncart", function() {
    alert("Product Addded");
    $.ajax({
      url: "http://localhost/onlineshopping/assets/php/api/products/api-single-product-details-cart.php",
      type: "POST",
      data: myJSON,
      success: function(data) {}
    });
  });
  </script>



















  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>