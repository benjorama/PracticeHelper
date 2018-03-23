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
		<h2>Sign Up</h2>
	
		<p>Welcome to Practice Helper! To create an account simply fill out the
			following fields.
		</p>

		<form method="post" action="include/process_signup.php">
			<p>
				<label>Enter user name:</label>
				<input type="text" name="username">
			</p>
			
			<p>
				<label>Enter password:</label>
				<input type="text" name="password">
			</p>

			<p>
				<label>Confirm password:</label>
				<input type="text" name="confirm_pass">
			</p>

			<p>
				<input type="submit" name="submit" value="Submit">
			</p>	
		</form>
	
		<?php
		if (isset($_SESSION['signup_errors'])){

			$signup_errors = $_SESSION['signup_errors'];
			if (!empty($signup_errors)) {
				echo "<p>FAIL!</p>";
				echo "<table>"; 
			foreach ($signup_errors as $error) {
				  echo "<tr>";
				  echo "<td>" . $error . "</td>";
				  echo "</tr>";
			}
			echo "</table>";
			} else {
				echo "<p>SUCCESS!</p>";
			}
		}
		unset($_SESSION['signup_errors']);
    	?>
	</div>
	<pre>
		<?php 
			if ($_GET) {
				print_r($_GET);
			} elseif ($_POST) {
				print_r($_POST);
			}
		?>
	</pre>
	
	<?php include_once('include/footer.php')?>
</body>
</html>