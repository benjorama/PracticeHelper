<?php 
$page = 'practicepage'; 
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>
	
	<div class="body">
		<h2>Your Practice Page</h2>
		<h3>What are you practicing now?</h3>
	
		<form>
			<input type="text"><br>
			<input type="submit" value="Start Session">
			<input type="submit" value="Stop Session">
		</form>
	
		<h3>Practice History</h3>
	</div>
	
	<?php include_once('include/footer.php'); ?>
</body>
</html>