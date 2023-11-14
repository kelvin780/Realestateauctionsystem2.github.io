<?php include_once 'database.php'; 
		session_start();
?>


<?php 

	if (isset($_POST['submit'])) {
		
		
		$uid =  $_POST['uid'];
		$pwd = $_POST['pwd'];
	
		function data_exists($conn, $uid, $email){
			$sql = "SELECT * FROM login WHERE username = ? OR usersemail = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			$msgErr = '<p style="color:red;"> Something went wrong, refresh to continue.</p>';
		}
		
		mysqli_stmt_bind_param($stmt, "ss",  $email, $uid);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row;
		} 
		mysqli_stmt_close($stmt);
		}

		if (empty($uid) || empty($pwd))	{
			$msgErr = '<p style="color:red;"> All fields required</p>';
		}
		$uidExist = data_exists($conn, $uid, $uid);
		if ($uidExist === false) {
			$msgErr = '<p style="color:red;"> Invalid username</p>';
		}
		$pwdhashed = $uidExist['pwd'];
		$checkedpwd = password_verify($pwd, $pwdhashed);
		if ($checkedpwd === false) {
			$msgErr = '<p style="color:red;"> Incorrect password</p>';
		} else if ($checkedpwd ===  true) {
			session_start();
			$_SESSION["id"] = $uidExist['id'];
			$_SESSION["useruid"] = $uidExist['username'];
			header("location: dashboard.php");
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
	
<div class="login-details" style="margin-top: 100px; width: 40%; height: 400px;">
	<div class="login" style="font-size: 18px;">

		<h1>Log in</h1>
	</div>
	<form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<label style="font-size: 18px">username/email</label>
		<input style="width: 95%; padding: 5px; margin: 5px; font-size: 16px;" type="text" name="uid" placeholder="username/email" id="username">

		<label style="font-size: 18px">password</label>
		<input style="width: 95%; padding: 5px; margin: 5px; font-size: 16px;" type="password" name="pwd" id="password">
		<?php echo $msgErr; ?>
			<?php error_reporting(0);
	echo "$message" ?? null;
	error_reporting(0); ?>
	<div>
		<a style="width: 95%; padding: 5px; margin: 5px; font-size: 18px; margin-top: 20px; margin-bottom: 20px; text-decoration: underline; color: white;" href="signup.php">Sign Up</a>
	</div>
	<div>
		<a style="width: 95%; padding: 5px; margin: 5px; font-size: 18px; margin-top: 40px; text-decoration: underline; color: white;" href="forgot password.php">forgot password</a>
	</div>
		<div>
			<input style="color: black; font-size: 18px; width: 18%; background-color: white; padding: 7px; margin-top: 20px;" type="submit" name="submit" value="Login" id="submit">

		</div>
	</form>
</div>
</body>
</html>