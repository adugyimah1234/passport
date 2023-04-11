<!DOCTYPE html>
<html>
<head>
	<title>Passport Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="apply" href="apply.php">
	<!-- Link to status.php -->
	<link rel="status" href="status.php">
</head>
<body>
	<header>
		<h1>Passport Application</h1>
		<nav>
			<ul>
				<li><a href="first.php">Home</a></li>
				<li><a href="apply.php">Apply</a></li>
				<li><a href="status.php">Check Application Status</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<main>

	<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
						<?php
						if ($user_online == true) {
						print '
						    <li><a href="logout.php">logout</a></li>
							<li><a href="'.$myrole.'">Profile</a></li>';
						}else{
						print '
							<li><a href="login.php">login</a></li>
							<li><a data-toggle="modal" href="#registerModal">register</a></li>';						
						}
						
						?>

						</ul>
					</div>
				
				</div>
	</main>
	
	<footer>
		<p>&copy; 2023 Passport Application Platform</p>
	</footer>
</body>
</html>