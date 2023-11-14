<?php 
	include 'database.php'; 
	session_start();
	$id = $_GET['bidId'];
	error_reporting(0);
	
	$sql = "SELECT * FROM bid_tablbe WHERE id ='$id'; ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Receipt</title>
	
	<link rel="stylesheet" type="text/css" href="receipt.css">
</head>
<body>
	<div class="cont">
		<img class="img" src="image/logo.jpg">

		<h2>Kel Properties</h2>
	</div>
	<div class="recpt">Payment Receipt</div>
	
	<div class="cont-img">
<?php
	echo "<img style='width: 100%; height: 400px;' src='Config/uploads/" .$row["file"]. "'>";
?>
	</div>
	<div class="text1">
		<h3>Payment Method</h3>
	</div>

	<div class="text1">
		<select class="select">
			<OPTION>Card</OPTION>
			<OPTION>Transfer</OPTION>
		</select>
		
	</div>

	
<div class="table"> 
<table>
	<thead>
		<tr>
			<th>Type of Property</th>
			<th>Decription</th>
			<th>Location</th>
			<th>Email</th>
			<th>Phone No.</th>
			<th>Amount</th>
			
		</tr>
	</thead>
	<tbody>
<?php

	$sql = "SELECT * FROM bid_tablbe WHERE id ='$id'; ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
			echo "<tr>
				<td>" . $row["prt_type"] ."</td>
				<td>" . $row["description"] ."</td>
				<td>" . $row["location"] ."</td>
				<td>" . $row["email"] ."</td>
				<td>" . $row["phone"] ."</td>
				<td>" . $row["amount"] ."</td>";
	
?>
		
	</tbody>
</table>
</div>

<div>
	<button class="pay">Pay Now</button>
</div>

</body>
</html>