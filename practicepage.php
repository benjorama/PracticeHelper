<?php 
$page = 'practicepage'; 
require_once('include/Dao.php');
$dao = new Dao();
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>
	
	<div class="body">

		<h2>Your Practice Page</h2>
		<h3>What are you practicing now?</h3>
	
		<form method="post">
			<input type="text" name="message"><br>
			<input type="submit" name="start" value="Start">
			<input type="submit" name="stop" value="Stop">
		</form>
	
		<h3>Practice History</h3>
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
	
	<?php include_once('include/footer.php'); ?>
</body>
</html>