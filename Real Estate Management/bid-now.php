<?php 
	include 'database.php'; 
	session_start();
	$id = $_GET['bidId'];
	error_reporting(0);
	
	$_SESSION['id'] = $id;
	$bid = $_GET['bid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Make Bid</title>
	<link rel="stylesheet" type="text/css" href="bid-now.css">
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
	<div class="Make">
		<h2>Make your bid</h2>
	</div>
	<form class="form" action="config/make-bid.php" method="POST">
		<label>Input Amount</label>
		<br>
		<input type="text" name="input_amount">
	<div class="bid-pop1">
		<h6>Are you sure you want to make a bid.<br> Once you make a bid there is no goind back. <br> If you wish to continue click <strong>Submit</strong></h6>
	
<button class="butClose1"  name="submit"> submit</button>
	<div class="butClose1"><h4 class="close">cancel</h4></div>

</div>
	<div class="submit"><h4>Submit</h4></div>
	</form>
	
<div class="bid-pop2">
		<img src="image/good.png">
		 <h4>Bid Successful</h4>
	<div class="ok"> <a href="dashboard.php">Ok</a> </div>

</div>
<script>
	const popup = document.querySelector('.submit');

	const pop1 = document.querySelector('.bid-pop1');
	
	const butClose = document.querySelector('.close');		
	popup.addEventListener('click', function () {
	
	pop1.classList.add('popup');
	pop1.classList.remove('remove');
		});	
	
	butClose.addEventListener('click', function () {
	
	pop1.classList.add('remove');

		});
	</script>
<?php 
	
	
	if ($bid) {
		// echo "done";
		echo "<script>
	const pop = document.querySelector('.bid-pop2');
	
	pop.classList.add('popup');
	
	pop1.classList.add('remove');

	</script>";

		}
	?>
				 
</body>
</html>