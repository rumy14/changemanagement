<?php
	include 'inc/header.php';
	include 'lib/User.php';
	Session::checkLogin();
	$user = new User();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
		$userLogin = $user->userLogin($_POST);
	}
	?>
	
	<div class="wrapper">
		<form action="" method="post" accept-charset="utf-8"class="form-signin">     
			<h2 class="form-signin-heading">Please login</h2>
			<div style="max-width: 600px; margin: 0 auto;">
				<?php
					if (isset($userLogin)) {
						echo $userLogin;
					}
				?>
			</div>
			<input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
			<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
			<!-- <label class="checkbox">
				<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
			</label> -->
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>   
		</form>
  	</div>
	
<?php include 'inc/footer.php'?>