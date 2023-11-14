
<?php include 'database.php'; ?>
<?php
	session_start();
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$uid =  $_POST['uid'];
		$pwd = $_POST['pwd'];
		$pwdRepeat = $_POST['pwdrepeat'];

		if (empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
			$msgErr = '<p style="color:red;"> Fill in all fields</p>';
		}

		if (empty($name)) {
		$msgErr = '<p style="color:red;"> Full name required</p>';
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$msgErr = '<p style="color:red;"> Email is required</p>';
		}
		if (strlen($pwd) != 8) {
			$msgErr = '<p style="color:red;"> Password is too weak</p>';
		}
		if ($pwd != $pwdRepeat) {
			$msgErr = '<p style="color:red;"> Password does not match</p>';
		}
		$sql = "INSERT INTO login (name, usersemail, username, pwd) VALUES (?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			$msgErr = '<p style="color:red;"> Something went wrong, refresh to continue.</p>';
		}
		//securing password
		$pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $pwdhash);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		function data_exists($uid, $email){
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
		$msgErr = '<p style="color:green;"> You have signed up</p>';
		header("location: login.php");

	}

 	?>
 
<section style=" width: 50%; height: 400px; margin: auto; background: black; padding: 20px;">
	<h2 style="color: white; text-align: center; font-size: 20px;">Sign Up</h2>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" style=" width: 100%;padding-bottom: 10px;font: 16px Tohoma;margin: auto;display: block;" method="POST">
		<input style="width: 100%;padding-bottom: 10px; margin-bottom: 10px;  font: 16px Tohoma;"  type="text" name="name" placeholder="Enter full name...">
		<input style="width: 100%;padding-bottom: 10px;margin-bottom: 10px; font: 16px Tohoma;" type="text" name="email" placeholder="Enter email...">
		<input style="width: 100%;padding-bottom: 10px;margin-bottom: 10px; font: 16px Tohoma;" type="text" name="uid" placeholder="Enter username">
		<input style="width: 100%;padding-bottom: 10px ;margin-bottom: 10px; font: 16px Tohoma;" type="password" name="pwd" placeholder="Enter password...">
		<input style="width: 100%;padding-bottom: 10px; margin-bottom: 10px; font: 16px Tohoma;" type="password" name="pwdrepeat" placeholder="Repeat password...">
		<?php echo "$msgErr"; ?>
		<input style="color: black; font-size: 18px; width: 20%; background-color: white; padding: 10px;" type="submit" name="submit" value="Sign Up">

	</form>

</section>


</body>
</html>
