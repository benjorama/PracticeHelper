<?php 
session_start();
require_once('include/Dao.php');
$page = 'practicepage'; 
$dao = new Dao();
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>
	<div class="body">

		<?php if (isset($_SESSION['success'])) {
			echo "<p>Congradulations! You've created an account. Here is your page.</p>";
			unset($_SESSION['success']);
		} 
		if (isset($_SESSION['practice_errors'])) {
			foreach ($_SESSION['practice_errors'] as $error) { ?>
				<tr class='error'>
					<td><?= $error; ?></td>
				</tr>
	  	<?php }} ?>

		<h2>Your Practice Page</h2>
		<h3>What are you practicing now?</h3>
	
		<form method="post" action="include/process_practice.php">
			<p><input type="text" name="message"></p>
			<p><input type="submit" name="start" value="start"></p>
		</form>

		<?php //start up some clock ?>
		<p id="clock">0:00:00:00</p>

		<form method="post" action="include/process_practice.php">
			<p><input type="submit" name="stop" value="stop"></p>
		</form>

		<?php //stop the clock?>
	
		<h3>Practice History</h3>
		<?php 
		if (!isset($_SESSION['logged_in'])) {
			if (isset($_SESSION['start'])) { ?>
				<table>
     				<tr><th>Start Time</th><th>Message</th><th>Stop Time</th></tr>
          			<tr><td><?= $_SESSION['start_time']; ?></td>
                	<td><?= htmlspecialchars($_SESSION['guest_message']); ?></td></tr>
				</table> 
				<?php 
			
			} elseif (isset($_SESSION['stop'])) { 
				$stop_time = date("Y-m-d H:i:s"); ?>
				<table>
     				<tr><th>Time</th><th>Message</th><th>Stop Time</th></tr>
          			<tr><td><?= $_SESSION['start_time']; ?></td>
            		<td><?= htmlspecialchars($_SESSION['guest_message']); ?></td>
					<td><?= $stop_time; ?></td></tr>
				</table>
				<?php 
				session_destroy(); 
				} 
			 
		} else { 
			$entries = $dao->get_sessions($_SESSION['username']);?>
			<table>
     			<tr><th>Time</th><th>Message</th></tr>
        		<?php foreach ($entries as $entry) { ?>
          		<tr><td><?= $entry['start_time']; ?></td>
                <td><?= htmlspecialchars($entry['message']); ?></td></tr>
				<?php } ?>
			</table>
		<?php } ?>
	</div>
	<?php include_once('include/footer.php'); ?>
</body>
</html>