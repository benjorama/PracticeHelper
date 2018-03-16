<?php 
$page = 'login'; 
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>

	<div class="body">
		<h2>Log In</h2>
		<p>Enter your user name and password to log in.</p>
	
		<form>
			Enter user name: <input type="text"><br>
			Enter password: <input type="text"><br>
			<input type="submit" value="Submit">
		</form>		
	</div>

	<?php include_once('include/footer.php'); ?>
</body>
</html>