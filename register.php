<?php
	include 'inc/header.php';
	include 'lib/User.php';
	$user = new User();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
		$userRegi = $user->userRegistration($_POST);
	}
?>
<div class="wrapper">
	<form action="" method="post" accept-charset="utf-8"class="form-signin">     
		<h2 class="form-signin-heading">Please Register</h2>
		<div style="max-width: 600px; margin: 0 auto;">
		<?php
			if (isset($userRegi)) {
				echo $userRegi;
			}
		?>
		</div>
		<input type="text" class="form-control" name="name" placeholder="Enter Your Name" required="" autofocus="" />
		<input type="text" class="form-control" name="username" placeholder="Enter Your Username" required="" autofocus="" />
		<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required="" autofocus="" />
		<input type="password" class="form-control" name="password" placeholder="Enter Your Password" required=""/>      
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>   
	</form>
</div>
<?php include 'inc/footer.php'?>