<?php
 include_once 'database.php';

?>
<?php
if (isset($_POST['submit'])) {

	$email = $_POST['email'];
	$pwd = $_POST['pwdNew'];
	$pwdRepeat = $_POST['pwdNewRepeat'];

	//Checking if email exists
	$sql = "SELECT * FROM login WHERE usersemail = '$email';";
	
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	$emailExist = $row['usersemail'];
	$pwdhash = $row['pwd'];


	if ($emailExist === false) {
		$msgErr1 = '<p style="color:red;font_size:13px;">User email doesnt exists</p>';
	} else {
		$pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);
		$sqlud = "UPDATE login SET pwd = '$pwdhashed' WHERE usersemail = '$email';";
		$resultud = mysqli_query($conn, $sqlud);
		header('location: login.php');

		$msgErr1 = '<p style="color:green;font_size:13px;">Password Reset Successful</p>'; 
	}


	if (empty($email) || empty($pwd) || empty($pwdRepeat)) {
		$msgErr1 = '<p style="color:red;font_size:13px;">Please enter all fields</p>';
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		$msgErr1 = '<p style="color:red;font_size:13px;">Invalid email address</p>';
	}
	if ($pwd != $pwdRepeat) {
		$msgErr1 = '<p style="color:red;font_size:13px;">Password doesnt match</p>';
	}
	
	if (strlen($pwd) != 8) {
		$msgErr1 = '<p style="color:red;font_size:13px;">Password has to be 8 characters long</p>';
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" type="text/css" href="reg-login.css">
</head>
<body>
	
<div class="forgot-cont">
	<div class="login">

		<h1>Reset password</h1>
	</div>

	<form class="forgot-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<label>email</label>
		<input style="width: 100%" type="text" name="email" placeholder="email" id="username">
		<br>
		<label>Enter new password</label>
		<input style="width: 100%; margin-bottom: 10px;" type="password" name="pwdNew" id="password">
		<br>
		<label>Confirm password</label>
		<input style="width: 100%; margin-bottom: 10px;" type="password" name="pwdNewRepeat" id="password">
		<?php echo $msgErr1; ?>
	
		<div class="butt">
			<input style="width: 10%;" type="submit" name="submit" value="Reset password" id="submit">

		</div>
	</form>
</div>
</body>
</html>