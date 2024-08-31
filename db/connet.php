<?php
$con = new mysqli("localhost","root","","tbl_mamnon");

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

// Change character set to utf8
$con -> set_charset("utf8");

?>