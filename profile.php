<?php
include 'inc/header.php';
include 'lib/user.php';
Session::checkSession();
if (isset($_GET['id'])) {
	$userid = (int) $_GET['id'];
}
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
	$userUpdate = $user->userUpdate($userid, $_POST);
}
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>User Profile <span class="pull-right"><a href="index.php" class="btn btn-primary">Back</a></span></h2>
	</div>
	<div class="panel-body">
		<div style="max-width: 600px; margin: 0 auto;">
			<?php
				if (isset($userUpdate)) {
					echo $userUpdate;
				}
			$userdata = $user->getUserById($userid);
			if ($userdata) {
				?>
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Your Name</label>
					<input type="text" name="name" id="name" class="form-control" required="" value="<?php echo $userdata->name; ?>" />
				</div>
				<div class="form-group">
					<label for="email">Username</label>
					<input type="text" name="username" id="username" class="form-control" required="" value="<?php echo $userdata->username; ?>" />
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="text" name="email" id="email" class="form-control" required="" value="<?php echo $userdata->email; ?>" />
				</div>
				<?php
					$setId = Session::get("id");
					if ($userid == $setId) {?>
					<button type="submit" name="update" class="btn btn-success">Update</button>
					<a href="changepass.php?id=<?php echo $userid; ?>" class="btn btn-info">Change Password</a>
					<?php }?>
			</form>
					<?php }?>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'?>