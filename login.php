<?php 
session_start();
$page = 'login'; 
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>

	<div class="body">
		<h2>Log In</h2>
		<p>Enter your user name and password to log in.</p>
	
		<form method="post" action="include/process_login.php">
			<p>
				<label>Enter user name: </label>
				<input type="text" name="username">
			</p>
			<p>
				<label>Enter password: </label>
				<input type="text" name="password">
			</p>
			<input type="submit" value="Submit">
		</form>
		<?php
		if (isset($_SESSION['login_errors'])){

			$login_errors = $_SESSION['login_errors'];
			if (!empty($login_errors)) {
				echo "<p>FAIL!</p>";
				echo "<table>"; 
			foreach ($login_errors as $error) {
				  echo "<tr>";
				  echo "<td>" . $error . "</td>";
				  echo "</tr>";
			}
			echo "</table>";
			} else {
				echo "<p>SUCCESS!</p>";
			}
		}
		unset($_SESSION['login_errors']);
    	?>		
	</div>

	<?php include_once('include/footer.php'); ?>
</body>
</html>