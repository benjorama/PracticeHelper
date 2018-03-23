<div class="header">
		<img src="/images/owlie-blues-300px.png" alt="Blue owl with a flugelhorn."
			class="logo">

		<?php if (!isset($_SESSION['logged_in'])) { ?>
		<ul class="navigation">
			<li<?php if ($page == 'home') { ?> id=currentPage <?php } ?>>
				<a href="index.php">Home</a></li>
			<li<?php if ($page == 'practicepage') { ?> id=currentPage <?php } ?>>
				<a href="practicepage.php">Try It</a></li>
			<li<?php if ($page == 'signup') { ?> id=currentPage <?php } ?>>
				<a href="signup.php">Sign Up</a></li>
			<li<?php if ($page == 'login') { ?> id=currentPage <?php } ?>>
				<a href="login.php">Log In</a></li>
		</ul>
		<?php } ?>

		<?php if (isset($_SESSION['logged_in'])) { ?>
		<ul class="navigation">
			<li<?php if ($page == 'home') { ?> id=currentPage <?php } ?>>
				<a href="index.php">Home</a></li>
			<li<?php if ($page == 'practicepage') { ?> id=currentPage <?php } ?>>
				<a href="practicepage.php">Your Page</a></li>
			<li<?php if ($page == 'login') { ?> id=currentPage <?php } ?>>
				<a href="logout.php">Log Out</a></li>
		</ul>
		<?php } ?>

	</div>