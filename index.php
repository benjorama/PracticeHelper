<?php 
session_start();
$page = 'home'; 
include_once('include/head.php');
?>

<body>
	<?php include_once('include/header.php'); ?>

	<div class="body">
		<h1>Practice Helper</h1>
		<h2>About</h2>
	
		<p>Practice Helper lets you keep track of information about your practice 
			sessions such as: 
		</p>
	
		<ul>
			<li>What you practice</li>
			<li>When you practice</li>
			<li>How long you practice</li>
		</ul>
	
		<p>Keeping track of this information will give you a good overview of your
			practice habits, and can help you identify areas for improvement. Click
			the button below to try it. 
		</p>
	
		<a href="practicepage.php">Try it!</a>
		<h2>Sign Up</h2>
		<p>If you'd like to save your practice history click the link below to sign up.</p>
		<a href="signup.php">Sign Up</a>
	</div>

	<?php include_once('include/footer.php'); ?>
	
<?php
/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 8-10 is a good baseline, and more is good if your servers
 * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
 * which is a good baseline for systems handling interactive logins.
 */
$timeTarget = 0.05; // 50 milliseconds 

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;
?>

</body>
</html>
