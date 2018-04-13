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
				<p class='error'><?= $error; ?></p>
		  <?php }}  ?>

		<h2>Your Practice Page</h2>
		<h3 for="message">What are you practicing now?</h3>
	
		<form method="post" action="include/process_practice.php">
			<p><input type="text" name="message"
				<?php
				if(isset($_SESSION['practice_errors'])) { 
					if(!isset($_SESSION['guest_message'])) {
						$_SESSION['guest_message'] = ""; 
					} ?>
					value=<?=htmlspecialchars($_SESSION['guest_message']); ?>
				<?php }
				if (isset($_SESSION['start'])) { ?>
					disabled 
				<?php } ?>>
			</p>

			<p><input type="submit" id="button"
				<?php 
				if(!isset($_SESSION['start']) && !isset($_SESSION['stop'])) { ?>
					name="start" value="start" class="start"
				<?php } 
				elseif (isset($_SESSION['start'])) { ?>
					name="stop" value="stop" class="stop"
				<?php }
				elseif (isset($_SESSION['stop'])) { ?>
					name="start" value="start" class="start"
				<?php } ?>> 
			</p>
		</form>

		<?php //start up some clock ?>
		<div class="stopwatch"><!--
        	--><span id="hours">00</span>:<!--
        	--><span id="minutes">00</span>:<!--
        	--><span id="seconds">00</span>:<!--
        	--><span id="milliseconds">000</span>
    	</div>
	
		<h3>Practice History</h3>

		<?php 
		//IF user is not logged in, keep page in "try it" mode
		if (!isset($_SESSION['logged_in'])) {
			if (isset($_SESSION['start'])) {
				$offset = $_SESSION['date_offset'];
				$_SESSION['start_time'] = date("Y-m-d H:i:s", strtotime(sprintf("+%d hours", $offset))); ?>
				<p><?="$offset"?></p>
				<table>
     				<tr><th>Start Time</th><th>Item</th><th>Duration</th></tr>
          			<tr><td><?= $_SESSION['start_time'] ?></td>
                	<td><?= htmlspecialchars($_SESSION['guest_message']); ?></td></tr>
				</table> 
				<?php 
			
			} elseif (isset($_SESSION['stop'])) { 
				$offset =  $_SESSION['date_offset'];
				$stop_time = new DateTime();
				if ($offset > 0) {
					$stop_time->add(new DateInterval("PT"."$offset"."H"));
				} elseif ($offset < 0) {
					$offset *= -1; 
					$stop_time->sub(new DateInterval("PT"."$offset"."H"));
				}
				$start_time = new DateTime($_SESSION['start_time']);
				$duration = $start_time->diff($stop_time);

				?>
				<table>
     				<tr><th>Start Time</th><th>Item</th><th>Duration</th></tr>
          			<tr><td><?= $_SESSION['start_time']; ?></td>
            		<td><?= htmlspecialchars($_SESSION['guest_message']); ?></td>
					<td><?= $duration->format('%H:%I:%S'); ?></td></tr>
				</table>
				<?php 
				session_destroy(); 
				} 
			 
		} else { 
			//If user is logged in, populate their practice history.
			$entries = $dao->get_sessions($_SESSION['username']);?>
			<table>
     			<tr><th>Start Time</th><th>Item</th><th>Duration</th></tr>
        		<?php foreach ($entries as $entry) { ?>
          		<tr><td><?= $entry['start_time']; ?></td>
                <td><?= htmlspecialchars($entry['message']); ?></td>
				<td><?= $entry['stop_time'] ?></td></tr>
				<?php } ?>
			</table>
		<?php } ?>
	</div>
	<?php include_once('include/footer.php'); ?>
</body>
</html>