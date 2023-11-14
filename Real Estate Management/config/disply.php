<?php 
include '../database.php'; 
	session_start();
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>display</title>
	<link rel="stylesheet" type="text/css" href="Student table form.css">
</head>
<body>

<div class="table"> 
<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Image</th>
			<th>Decription</th>
			<th>Time left</th>
			<th>Amount</th>
			<th>Bid</th>
		</tr>
	</thead>
	<tbody>
<?php
	$sql = "SELECT * FROM bid_now;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["Id"];
			$_SESSION['id'] = $id;
			echo "<tr>
				<td>" . $row["Id"] ."</td>
				<td> <img class='login' style= 'width: 100%; height: 100px;' src='uploads/" .$row["Image"]. "'></td>
				<td>" . $row["Description"] ."</td>
				<td>" . $row["Timeleft"] ."</td>
				<td>" . $row["Amount"] ."</td>
				<td><button class='tab' type='submit' name='submit'><a href='../bid-now.php?bidId=".$id."'>Bid Now</a></button></td>
				</form>
			</tr>";
		}
	}

?>
	</tbody>
</table>

</div>
</body>
</html>