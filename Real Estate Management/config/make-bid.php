<?php 
include '../database.php'; 
session_start();

$id = $_SESSION['id'];

$input_amount = $_POST['input_amount'];

	if (isset($_POST['submit'])) {
		
		$sql2 = "UPDATE bid_now SET Input_amount = '$input_amount', Amount = '$input_amount' WHERE Id ='$id';";
		mysqli_query($conn, $sql2);
		echo "update successful";

		
	$sql = "SELECT * FROM bid_now 	WHERE Id ='$id';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
	$row = mysqli_fetch_assoc($result);
	$description =	$row["Description"];
	$timeleft = $row["Timeleft"];
	$amount = $row["Amount"];
	$image = $row["Image"];

	// echo "result ".$description;
	// echo "result ".$timeleft;
	// echo "result ".$amount;
	echo "result ".$image;
	$sqlu = "INSERT INTO bided (Description, Timeleft, Amount, Image) VALUES ('$description', '$timeleft', '$amount', '$image');";
			mysqli_query($conn, $sqlu);
	$sqlb = "SELECT * FROM bided;";
			
	$result2 = mysqli_query($conn, $sqlb);
	$resultCheck2 = mysqli_num_rows($result2);
	if ($resultCheck2 > 0) {
		while ($row = $row1 = mysqli_fetch_assoc($result2)) {
		
		$img = $row1['Image'];
		$desp = $row1['Description'];

	if ($img = $image) {
		$sql2 = "UPDATE bided SET Amount = '$amount' WHERE Image ='$img';";
		mysqli_query($conn, $sql2);
		echo "update successful";
			}
			}
		}
	}
	
}
header("location: ../bid-now.php?bid=successful");