<?php 
session_start();
$page = 'login'; 
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>

	<div class="body">
	<?php
		if (isset($_SESSION['login_errors'])){
			$login_errors = $_SESSION['login_errors'];
			foreach ($login_errors as $error) { ?>
				<p class="error"><?=$error?></p>
			<?php } 
		} ?>		
		<h2>Log In</h2>
		<p>Enter your user name and password to log in.</p>
	
		<form method="post" action="include/process_login.php">
			<p>
				<label>Enter user name: </label>
				<input type="text" name="username"
				<?php 
					if (isset($_SESSION['login_errors'])) { ?>
						value=<?= $_SESSION['username']?>
				<?php } ?>>
			</p>

			<p>
				<label>Enter password: </label>
				<input type="text" name="password"
				<?php 
					if (isset($_SESSION['login_errors'])) { ?>
						value=<?= $_SESSION['password']?>
				<?php } ?>>
			</p>
			<input type="submit" value="Submit">
		</form>
	</div>

	<?php
	unset($_SESSION['login_errors']); 
	include_once('include/footer.php'); ?>
</body>
</html>