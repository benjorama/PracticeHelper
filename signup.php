<!DOCTYPE html>
<html>
<head>
	<link href="/images/favicon.ico" type="image/png" rel="shortcut icon" />
	<link href="/styles/style.css" type="text/css" rel="stylesheet" />
	<title>Practice Helper: Sign Up</title>
</head>

<body>
	<?php include_once('include/header.php'); ?>
	
	<div class="body">
		<h2>Sign Up</h2>
	
		<p>Welcome to Practice Helper! To create an account simply fill out the
			following fields.
		</p>
	
		<form>
			Enter user name: <input type="text"><br>
			Enter password: <input type="text"><br>
			Confirm password: <input type="text">
			<input type="submit" value="Submit">
		</form>
	</div>
	
	<?php include_once('include/footer.php')?>
</body>
</html>