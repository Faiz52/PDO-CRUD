<?php

$dsn      = 'mysql:host=localhost;dbname=pdocrud';
$username = 'root';
$password = '';
$conn 	  = new PDO($dsn,$username,$password);

function in($data) {
	$data = strip_tags($data);
	return trim(htmlentities($data, ENT_QUOTES, 'UTF-8'));
  }

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
