<?php
 include '../database.php'; 
session_start();
if (isset($_POST['submit'])) {
	$allowed_ext = array('png', 'jpg', 'jpeg');
	if (!empty($_FILES['upload']['name']) ) {
		//print_r($_FILES);
		$file_name =  $_FILES['upload']['name'];
		$file_size =  $_FILES['upload']['size'];
		$file_tmp =  $_FILES['upload']['tmp_name'];
		
		//get file extenion
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));

		$users = $_SESSION["useruid"];
		//echo "$file_ext";
		$fileNameNew = $users. "." .$file_ext;
		$target_dir = "uploads/$fileNameNew";
		$_SESSION["fileName"] = $fileNameNew;
		echo $fileNameNew;
		// validate file ext
		if (in_array($file_ext, $allowed_ext)) {
			if ($file_size <= 4000000) {
				move_uploaded_file($file_tmp, $target_dir);
				$message = '<p style="color: green;">file uploaded</p>';
			
			$sql = "INSERT INTO profileimg (username, status) VALUES ('$users', '$fileNameNew')";
			mysqli_query($conn, $sql);

			$sqlud = "UPDATE profileimg SET status = '$fileNameNew' WHERE username ='$users';";
			$resultud = mysqli_query($conn, $sqlud);

			header('location: ../dashboard.php');
		
				}
			else{
					$message = '<p style="color: red;">file is too large</p>';
				}
		}else{
			$message = '<p style="color: red;">invalide file</p>';
				}
	}else{
		$message = '<p style="color: red;">Please choice a file</p>';
			}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File uploading</title>
</head>
<body>
	<img class='login' src='config/uploads/a.png'>
	<?php 
	echo "$message" ?? null; ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
	Select image to upload:
	<br>
	<input type="file" name="upload">

	<br>
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>