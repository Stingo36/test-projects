<?php
  session_start();
  $a = $_SESSION['fname'];
   
?>
<!doctype html>
<html lang="en">

<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
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
    <div class="container-fluid text-center " style="background-color: #eee;">
      <div class="row">
        <div class="col-12">
          <label for="exampleInputtext1">Categories:</br></label>
          <div class="form-group " id="abc">
            <div class="form-check form-check-inline">
              <label class='form-check-label' for='inlineCheckbox1'></label>
            </div>
          </div>
          <input type="hidden" id="cat_id">
        </div>
      </div>
    </div>
    <section id="load-table" style="background-color: #eee;">
    </section>
  </main>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


  <Script>
  $(document).ready(function() {
    // FETCH ALL
    function loadTable() {
      $.ajax({
        url: "http://localhost/onlineshopping/assets/php/api/products/api-display-all.php",
        type: "GET",
        success: function(data) {
          //console.log(data);
          if (data.status == false) {
            $("load-table").append("<tr><td colspan='6'> <h2>" + data.message + "</h2> </td> </tr>")
          } else {
            $.each(data, function(key, value) {
              $("#load-table").append(
                "<div class='container'>" +
                "<div class='row justify-content-center mb-3'>" +
                " <div class='col-md-12 col-xl-10'>" +
                " <div class='card shadow-0 border rounded-3'>" +
                " <div class='card-body'>" +
                "  <div class='row'>" +
                "<div class='col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0'>" +
                "<div class='bg-image hover-zoom ripple rounded ripple-surface text-center'>" +
                "<img src='/onlineshopping/assets/images/dummy-img.png' class='w-50' alt='dummy img'/>" +
                " <a href='#!'>" +
                "<div class='hover-overlay'>" +
                "<div class='mask' style='background-color: rgba(253, 253, 253, 0.15);'></div>" +
                " </div>" +
                "</a>" +
                "</div>" +
                "</div>" +
                "<div class='col-md-6 col-lg-6 col-xl-6'>" +
                "<h5>" + value.product_name + "</h5>" +
                "<p class='text-truncate mb-4 mb-md-0'>" +
                " " + value.category_name + "" +
                "</p>" +
                " </div>" +
                " <div class='col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start'>" +
                " <div class='d-flex flex-row align-items-center mb-1'>" +
                "  <h4 class='mb-1 me-1'>$" + value.current_price + "</h4>" +
                " <span class='text-danger'><s>$" + value.raw_price + "</s></span>" +
                " </div>" +
                " <h6 class='text-success'>Free shipping</h6>" +
                " <div class='d-flex flex-column mt-4'>" +
                "<td> <a href='product-details.php'><button  class='btn btn-outline-primary btn-sm mt-2 w-100 edit-btn' data-eid='" +
                value.product_id + "'><i class='fas fa-edit'></i>View Details </button> </a>" + " " +
                "<td> <a href='#'><button id=''  class='btn btn-outline-primary btn-sm mt-2 w-100 edit-btncart' data-eidcart='" +
                value.product_id + "'><i class='fas fa-edit'></i>Add To Cart </button> </a>" + " " +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>"
              );
            });

          }
        }
      });
    }

    loadTable();


    //view products
    $(document).on("click", ".edit-btn", function() {
      var u_id = $(this).data("eid");
      var obj = {
        product_id: u_id
      }
      console.log(obj);
      sessionStorage.setItem("obj", JSON.stringify(obj));
      var myJSON = JSON.stringify(obj);
      // to pass the data in singlefetch api file
      $.ajax({
        url: "http://localhost/onlineshopping/assets/php/api/products/api-single-product-details.php",
        type: "POST",
        data: myJSON,
        success: function(data) {

          localStorage.setItem("jsArray", JSON.stringify(data));
          console.log(data);
        }
      });
    });

    //cart
    $(document).on("click", ".edit-btncart", function() {
      alert("Product Addded");
      var u_idd = $(this).data("eidcart");
      var obj = {
        product_id: u_idd
      }
      //console.log(obj);
      sessionStorage.setItem("obj", JSON.stringify(obj));
      var myJSON = JSON.stringify(obj);

      $.ajax({
        url: "http://localhost/onlineshopping/assets/php/api/products/api-single-product-details-cart.php",
        type: "POST",
        data: myJSON,
        success: function(data) {}
      });
    });


    // display categories
    function loadCat() {
      $.ajax({
        url: "http://localhost/onlineshopping/assets/php/api/products/api-display-cat.php",
        type: "GET",
        success: function(data) {
          //console.log(data);
          if (data.status == false) {

          } else {
            $.each(data, function(key, value) {
              $("#abc").append(
                "<input type='checkbox' class='form-check-input m-2 edit-btn' data-eid='" + value
                .cat_id + "'>" + value
                .cat_name + "</button>"
              );
            });
          }
        }
      });
    }
    loadCat()

    $(document).on("click", ".edit-btn", function() {
      $('#load-table').html(" ");
      var u_id = $(this).data("eid");
      var obj = {
        cat_id: u_id
      }
      var myJSON = JSON.stringify(obj);
      console.log(myJSON)
      $.ajax({
        url: "http://localhost/onlineshopping/assets/php/api/products/api-display-per-cat.php",
        type: "POST",
        data: myJSON,
        success: function(data) {
          sessionStorage.setItem("jsArray", JSON.stringify(data));
          console.log(data);
          jsarray = JSON.parse(sessionStorage.getItem("jsArray"));
          $.each(data, function(key, value) {
            $("#load-table").append(
              "<div class='container'>" +
              "<div class='row justify-content-center mb-3'>" +
              " <div class='col-md-12 col-xl-10'>" +
              " <div class='card shadow-0 border rounded-3'>" +
              " <div class='card-body'>" +
              "  <div class='row'>" +
              "<div class='col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0'>" +
              "<div class='bg-image hover-zoom ripple rounded ripple-surface text-center'>" +
              "<img src='/onlineshopping/assets/images/dummy-img.png' class='w-50' alt='dummy img'/>" +
              " <a href='#!'>" +
              "<div class='hover-overlay'>" +
              "<div class='mask' style='background-color: rgba(253, 253, 253, 0.15);'></div>" +
              " </div>" +
              "</a>" +
              "</div>" +
              "</div>" +
              "<div class='col-md-6 col-lg-6 col-xl-6'>" +
              "<h5>" + value.product_name + "</h5>" +
              "<p class='text-truncate mb-4 mb-md-0'>" +
              " " + value.category_name + "" +
              "</p>" +
              " </div>" +
              " <div class='col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start'>" +
              " <div class='d-flex flex-row align-items-center mb-1'>" +
              "  <h4 class='mb-1 me-1'>$" + value.current_price + "</h4>" +
              " <span class='text-danger'><s>$" + value.raw_price + "</s></span>" +
              " </div>" +
              " <h6 class='text-success'>Free shipping</h6>" +
              " <div class='d-flex flex-column mt-4'>" +
              "<td> <a href='product-details.php'><button  class='btn btn-outline-primary btn-sm mt-2 w-100 edit-btn' data-eid='" +
              value.product_id + "'><i class='fas fa-edit'></i>View Details </button> </a>" + " " +
              "<td> <a href='#'><button id=''  class='btn btn-outline-primary btn-sm mt-2 w-100 edit-btncart' data-eidcart='" +
              value.product_id + "'><i class='fas fa-edit'></i>Add To Cart </button> </a>" + " " +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>"
            );
          });

        }
      });
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


</body>

</html>