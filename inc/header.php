<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/Session.php';
Session::init();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Register System PHP</title>
		<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="inc/design.css" />
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="inc/jquery.min.js"></script>
		<script src="inc/bootstrap.min.js"></script>
	</head>
	<?php
		if (isset($_GET['action']) && $_GET['action'] == 'logout') {
			Session::destroy();
		}
	?>
	<body>
		<section class="navigation">
			<div class="nav-container">
				<div class="brand">
					<a href="index.php">Logo</a>
				</div>
				<nav>
					<div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
					<ul class="nav-list">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="#!">Info</a>
							<ul class="nav-dropdown">
								<?php
									$id = Session::get("id");
									$userlogin = Session::get("login");
									if ($userlogin == true) { ?>
										<li><a href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
										<li><a href="?action=logout">Logout</a></li>
									<?php

									} else { ?>
											<li><a href="login.php">Login</a></li>
											<li><a href="register.php">Register</a></li>
										<?php 
									}
								?>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</section><br>
			