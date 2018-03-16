<?php 
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
	
		<input type="button" value="Try it!">
		<h2>Sign Up</h2>
		<p>If you'd like to save your practice history click the button below to sign up.</p>
		<button type="button">Sign Up!</button>
	</div>

	<?php include_once('include/footer.php'); ?>
</body>
</html>
