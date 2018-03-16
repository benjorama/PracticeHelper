<?php 
$page = 'signup';
include_once('include/head.php'); 
?>

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