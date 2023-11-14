
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<label>Type of Property</label>
		<input type="text" name="prt_type">

		<label>Brief Discription</label>
		<input type="text" name="description">

		<label>Contact email</label>
		<input type="text" name="email">

		<label>Location</label>
		<input type="text" name="location">

		<label>Amount</label>
		<input type="text" name="amount">

		<label>Upload File</label>
		<input type="file" name="file">

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