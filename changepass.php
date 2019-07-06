<?php
include 'inc/header.php';
include 'lib/user.php';
Session::checkSession();
if (isset($_GET['id'])) {
	$userid = (int) $_GET['id'];
}
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])) {
	$updatePass = $user->updatePass($userid, $_POST);
}
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Change Password <span class="pull-right"><a href="index.php" class="btn btn-primary">Back</a></span></h2>
	</div>
	<div class="panel-body">
		<div style="max-width: 600px; margin: 0 auto;">
			<?php
if (isset($updatePass)) {
	echo $updatePass;
}
?>
			<form action="" method="post">
				<div class="form-group">
					<label for="old_password">Old Password</label>
					<input type="password" name="old_password" class="form-control" required="" />
				</div>
				<div class="form-group">
					<label for="password">New Password</label>
					<input type="password" name="password" class="form-control" required="" />
				</div>
				<button type="submit" name="updatepass" class="btn btn-success">Update Password</button>
			</form>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'?>