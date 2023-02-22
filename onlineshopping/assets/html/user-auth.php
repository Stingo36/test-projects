<?php
session_start();
$_self =  $_SERVER['PHP_SELF'];

if (preg_match_all("/index\.php/", $_self) || preg_match_all("/register\.php/", $_self)) {
  // Check if page is in login or registration page
  if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    header('location: ./home.php');
  }
} else {
  // Check if not in login or registration page
  if (!isset($_SESSION['id']) || (isset($_SESSION['id']) && empty($_SESSION['id']))) {
    header('location: ./home.php');
  }
}
