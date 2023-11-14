<?php 
include 'database.php'; 

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

			$sql = "INSERT INTO bid_tablbe (file) VALUES ('$name')";
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
?>


<p><strong>Note: </strong> files should not be larger than 2mb</p>
<form class="form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">

<?php echo $msg ?? null; ?>
<br>
<label>Upload Documents</label>
<input type="file" name="file">
<input type="submit" name="submit">
</form>