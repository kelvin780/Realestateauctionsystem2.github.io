<?php 
include '../database.php'; 

$prt_type = $_POST['prt_type'];
$description = $_POST['description'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$amount = $_POST['amount'];
$file = $_POST['file'];



	if (isset($_POST['submit'])) {
		$allowed_ext = array('jpg', 'png', 'jpeg');

		if (!empty($_FILES['file']['name'])) {
			//print_r($_FILES);
			$name = $_FILES['file']['name'];
			$size = $_FILES['file']['size'];
			$tmp = $_FILES['file']['tmp_name'];
			$target_dir = "uploads/$name";

			//get file extension
			$file_ext = explode('.', $name);
			$file_ext = strtolower(end($file_ext));
			// valide file
			if (in_array($file_ext, $allowed_ext)) {
				if ($size <= 2000000) {
					move_uploaded_file($tmp, $target_dir);

			// $sql = "INSERT INTO bid_tablbe (file) VALUES ('$name')";
			// mysqli_query($conn, $sql);
			$sql = "INSERT INTO bid_tablbe(prt_type, description, email, phone, location, amount, file) VALUES ('$prt_type', '$description', '$email', '$phone', '$location', '$amount', '$name');";
			mysqli_query($conn, $sql);

					$msg = '<p style="color:green;"> file uploaded  </p>';
				}else {
			$msg = '<p style="color:red;"> file is too large </p>';
		}
			}else {
			$msg = '<p style="color:red;"> invalid file </p>';
				}
		} else {
			$msg = '<p style="color:red;"> Please select file </p>';
		}
	}


header("location: ../dashboard.php?upload=success");