<?php 
session_start();
$page = 'signup'; 
require_once('include/Dao.php');
$dao = new Dao();
include_once('include/head.php'); 
?>

<body>
	<?php include_once('include/header.php'); ?>
	
	<div class="body">
	<?php
		if (isset($_SESSION['signup_errors'])){
			$signup_errors = $_SESSION['signup_errors'];
			foreach ($signup_errors as $error) { ?>
				 <p class="error"><?= $error ?></p>
			<?php } 
		} ?>

		<h2>Sign Up</h2>
	
		<p>Welcome to Practice Helper! To create an account simply fill out the
			following fields.
		</p>

		<form method="post" action="include/process_signup.php">
			<p>
				<label>Enter user name:</label>
				<input type="text" name="username"
				<?php if (isset($_SESSION['signup_errors'])) ?>
					value=<?= $_SESSION['username']?>
				>
			</p>
			
			<p>
				<label>Enter password:</label>
				<input type="text" name="password"
				<?php if (isset($_SESSION['signup_errors'])) ?>
					value=<?= $_SESSION['password']?>
				>
			</p>

			<p>
				<label>Confirm password:</label>
				<input type="text" name="confirm_pass"
				<?php if (isset($_SESSION['signup_errors'])) ?>
					value=<?= $_SESSION['confirm_pass']?>
				>
			</p>

			<p>
				<input type="submit" name="submit" value="Submit">
			</p>	
		</form>
	</div>

	<?php
	unset($_SESSION['signup_errors']); 
	include_once('include/footer.php')?>
</body>
</html>