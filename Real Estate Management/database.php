
<?php

$host = 'localhost';
$name = 'Adasi';
$password = '123456';
$db = 'real_estate';

$conn =  mysqli_connect($host, $name, $password, $db);
if (!$conn) {
	die("connection failed" . mysqli_connect_error());
}
