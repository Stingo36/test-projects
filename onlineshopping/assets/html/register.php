<?php
include "../php/api/db-con.php";
require_once("user-auth.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
  $fname = addslashes($con->real_escape_string($_POST['first_name']));
  $mname = addslashes($con->real_escape_string($_POST['middle_name']));
  $lname = addslashes($con->real_escape_string($_POST['last_name']));
  $uname = addslashes($con->real_escape_string($_POST['username']));
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  // Check username duplication
  $check = $con->query("SELECT id FROM `user_tbl` where `username` = '{$uname}'")->num_rows;
  if ($check > 0) {
    $err = "Username is already taken!";
  } else {
    $sql = "INSERT INTO `user_tbl` (`first_name`, `middle_name`, `last_name`, `username`, `password`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssss", $fname, $mname, $lname, $uname, $password);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      $success = "Account has been created succesfully. <a href='index.php'>Login Now!</a>";
      $_SESSION['success_msg'] = $success;
      header('location: register.php');
      unset($_POST);
      exit;
    } else {
      $err = "Creating your account has been failed for some reason!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Registration Page</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <style>
  html,
  body {
    min-height: 100%;
    width: 100%
  }
  </style>
</head>

<body class="">

  <div class="container my-5 py-4">
    <h2 class="text-center">Create New Account</h2>
    <div class="col-lg-5 mx-auto">
      <hr class="border-light" height="2px">
      <div class="card rounded-0">
        <div class="card-body rounded-0">
          <div class="container-fluid">
            <form id="registration-form" action="" method="POST">
              <div class="mb-3">
                <label for="first_name"><b>First Name</b> <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-0" minlength="3" id="first_name" name="first_name" required="required" pattern="[A-Za-z]+" title="Letters only
                  value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" placeholder="Enter First Name">
              </div>
              <div class="mb-3">
                <label for="middle_name"><b>Middle Name</b></label>
                <input type="text" class="form-control rounded-0" id="middle_name" name="middle_name"
                  value="<?= isset($_POST['middle_name']) ? $_POST['middle_name'] : '' ?>" placeholder="Enter Middle Name (optional))">
              </div>
              <div class="mb-3">
                <label for="last_name"><b>Last Name</b> <span class="text-danger">*</span></label>
                <input type="text" class="form-control rounded-0" minlength="3"  id="last_name" name="last_name" required="required" pattern="[A-Za-z ]+" title="Letters only
                  value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" placeholder="Enter last Name">
              </div>
              <div class="mb-3">
                <label for="username"><b>Username</b></label>
                <input type="text" minlength="3" class="form-control rounded-0" id="username" name="username" required="required"
                  value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Enter Username">
              </div>
              <div class="mb-3">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control rounded-0" id="password" name="password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                  placeholder="********">
              </div>
              <?php if (isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])) : ?>
              <div class="alert alert-success">
                <?= $_SESSION['success_msg'] ?>
              </div>
              <?php unset($_SESSION['success_msg']); ?>
              <?php else : ?>
              <p class="text-center">
                <a href="index.php">Already have an account? Login here</a>
              </p>
              <?php endif; ?>
              <?php if (isset($err) && !empty($err)) : ?>
              <div class="alert alert-danger">
                <?= $err ?>
              </div>
              <?php endif; ?>
            </form>
          </div>
        </div>
        <div class="card-footer text-center">
          <button class="btn btn-primary rounded-0" form="registration-form" id="registration-form-id" onclick="validations()">Create Account</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  $con->close();
  ?>

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script>
    function validations(){

    }
  </script>



</body>

</html>