
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
	<form action="config/bid.php" method="POST" enctype="multipart/form-data">
		<label>Image</label>
		<input type="file" name="image">

		<label>Brief Discription</label>
		<input type="text" name="description">

		<label>Time</label>
		<input type="text" name="timeleft">

		<label>Amount</label>
		<input type="text" name="amount">

		<button class="button" type="submit" name="submit">Add</button>
		
	</form>
<div class="bid-pop">
		<img src="image/good.png">
		<h4>Bid Successful</h4>
		 <div class="butClose">close</div>

	</div>

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