<?php
	 include 'database.php'; 
	 session_start();
	
	$users = $_SESSION["useruid"];
	$sql = "SELECT * FROM bid_tablbe;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>DASHBOARD</title>
<link rel="stylesheet" type="text/css" href="dashboard.css">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>	
	<section class="dash">
	<h1>DASHBOARD</h1>

	<div class="user">
		<div class="user-pic">
			<a class="button"href="logout.php">Log out </a>
		</div>
		<?php

 if (isset($_SESSION["useruid"]))  {
	echo '<h3>Hello ' . $_SESSION["useruid"]. '</h3>';

	
	}
	
 ?>
		

	</div>
</section>
<div class="login-cont">

</div>
<div class="cont1">
		
		<a class="button"href="logout.php">Log out </a>
</div>

<section class="Admin-cont">
	<ul class="cont">
		<li class="list">Auction Property</li>
		<li class="list">Sell Property</li>
		<li class="list">Buy Property </li>
		<li class="list">Bided Property</li>

	</ul>
</section>

<section class="upload">
	<div class="geo">
		<h3>Aunction Properties</h3>

<div class="table"> 
<table>
	<thead>
		<tr>
			
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
				
				<td> <img class='login' style= 'width: 100%; height: 100px;' src='config/uploads/" .$row["Image"]. "'></td>
				<td>" . $row["Description"] ."</td>
				<td>" . $row["Timeleft"] ."</td>
				<td>" . $row["Amount"] ."</td>
				<td><a class='tab' href='bid-now.php?bidId=".$id."'>Bid Now</a></td>
				</form>
			</tr>";
		}
	}

?>
	</tbody>
</table>

</div>

	
</section>

<section class="add-admin">
	<form action="config/market.inc.php" method="POST" enctype="multipart/form-data">
		<label>Type of Property</label>
		<input type="text" name="prt_type">

		<label>Brief Discription</label>
		<input type="text" name="description">

		<label>Contact email</label>
		<input type="text" name="email">

		<label>Phone Number</label>
		<input type="text" name="phone">

		<label>Location</label>
		<input type="text" name="location">

		<label>Amount</label>
		<input type="text" name="amount">

		<label>Upload File</label>
		<input type="file" name="file">

		<button class="button" type="submit" name="submit">Add</button>
		
	</form>

</section>

<section class="view-adminnew">


<h3>Apartments for lease</h3>

<div class="table"> 
<table>
	<thead>
		<tr>
			<th>Type of Property</th>
			<th>Decription</th>
			<th>Location</th>
			<th>Phone No.</th>
			<th>Amount</th>
			<th>Image</th>
			<th>Buy</th>
		</tr>
	</thead>
	<tbody>
<?php
	$sql = "SELECT * FROM bid_tablbe;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id2 = $row["id"];
			echo "<tr>
				<td>" . $row["prt_type"] ."</td>
				<td>" . $row["description"] ."</td>
				<td>" . $row["location"] ."</td>
				
				<td>" . $row["phone"] ."</td>
				<td>" . $row["amount"] ."</td>
				<td> <img class='login' style= 'width: 100%; height: 100px;' src='Config/uploads/" .$row["file"]. "'></td>
				<td> <a class='tab' href='receipt.php?bidId=".$id2."'>Buy Now</a>
				</td>
			</tr>";
		}
	}

?>
		
	</tbody>
</table>
</div>

</section>
<section class="bid">
<div class="table"> 
<table>
	<thead>
		<tr>
			<th>Image</th>
			<th>Decription</th>
			<th>Time left</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>
<?php
	$sql = "SELECT * FROM bided;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
						
			echo "<tr>
				<td> <img class='login' style= 'width: 100%; height: 100px;' src='config/uploads/" .$row["Image"]. "'></td>
				<td>" . $row["Description"] ."</td>
				<td>" . $row["Timeleft"] ."</td>
				<td>" . $row["Amount"] ."</td>
			</tr>";
		}
	}

?>
	</tbody>
</table>

</div>
</section>
<script src="dashboard.js"></script>
<?php 
		if (isset($_POST['submit'])) {
			echo "done";
			echo "<script>
	const pop = document.querySelector('.bid-pop');
	
	const butClose = document.querySelector('.butClose');		
		
	pop.classList.add('popup');

	butClose.addEventListener('click', function () {
	
	pop.classList.add('remove');

		});
	</script>";
				 
		}
	?>

</body>
</html>