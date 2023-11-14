<?php 
include '../database.php'; 

$image = $_POST['image'];
$description = $_POST['description'];
$timeleft = $_POST['timeleft'];
$amount = $_POST['amount'];


	if (isset($_POST['submit'])) {
		$allowed_ext = array('jpg', 'png', 'jpeg');

		if (!empty($_FILES['image']['name'])) {
			//print_r($_FILES);
			$name = $_FILES['image']['name'];
			$size = $_FILES['image']['size'];
			$tmp = $_FILES['image']['tmp_name'];
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
			$sql = "INSERT INTO bid_now(Description, Timeleft, Amount, Image) VALUES ('$description', '$timeleft', '$amount', '$name');";
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


 header("location: disply.php?upload=success");