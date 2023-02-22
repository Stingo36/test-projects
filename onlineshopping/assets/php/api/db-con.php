<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$database = "onlineshopping";

$con = mysqli_connect($db_server, $db_username, $db_password, $database) or die("<script>
  alert('Connection Failed.')
</script>");
