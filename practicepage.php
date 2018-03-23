<?php 
session_start();
require_once('include/Dao.php');
$page = 'practicepage'; 
$dao = new Dao();
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php');
	if (isset($_SESSION['success'])) {
		echo "<p>Congradulations! You've created an account. Here is your page.</p>";
		unset($_SESSION['success']);
	}?>
	
	<div class="body">

		<h2>Your Practice Page</h2>
		<h3>What are you practicing now?</h3>
	
		<form method="post" action="include/process_practice.php">
			<p><input type="text" name="message"></p>
			<p><input type="submit" name="start" value="start"></p>
		</form>

		<?php //start up some clock ?>

		<form method="post" action="include/process_practice.php">
			<p><input type="submit" name="stop" value="stop"></p>
		</form>

		<?php //stop the clock?>
	
		<h3>Practice History</h3>
		<?php 
		if (!isset($_SESSION['logged_in'])) {
			if (!isset($_SESSION['guest_message'])) {
				$_SESSION['guest_message'] = '';	
			}
			$time = time();
			$message = $_SESSION['guest_message']; ?>

			<ul>
				<li><?= $message ?></li>
				<li><?= $time ?></li>
			</ul>
			<?php session_destroy(); 
		} else { 
			$entries = $dao->get_sessions($_SESSION['username']);?>
			<table>
     			<tr><th>Time</th><th>Message</th></tr>
        		<?php foreach ($entries as $entry) { ?>
          		<tr><td><?= $entry['start_time']; ?></td>
                <td><?= $entry['message']; ?></td></tr>
				<?php } ?>
			</table>
		<?php } ?>
	</div>
	<?php include_once('include/footer.php'); ?>
</body>
</html>