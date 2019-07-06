<?php
	include 'inc/header.php';
	include 'lib/user.php';
	Session::checkSession();
	$user = new User();
	$loginmsg = Session::get("loginmsg");
	if (isset($loginmsg)) {
		echo $loginmsg;
	}
	if(isset($_GET['Message'])){
		echo $_GET['Message'];
	}
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>User List <span class="pull-right"><strong>Wecome!</strong>
		<?php
			$name = Session::get("name");
			if (isset($name)) {
				echo $name;
			}
		?>
		</span></h2>
	</div>
	<div class="panel-body">
		<table class="table table-stripped">
			<th width="20%">Serial</th>
			<th width="20%">Name</th>
			<th width="20%">Username</th>
			<th width="20%">Email Address</th>
			<th width="20%">Action</th>
			<?php
				$user = new User();
				$userdata = $user->getUserData();
				if ($userdata) {
					$i = 0;
					foreach ($userdata as $userd) {
						$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $userd['name']; ?></td>
				<td><?php echo $userd['username']; ?></td>
				<td><?php echo $userd['email']; ?></td>
				<td>
					<a href="profile.php?id=<?php echo $userd['id']; ?>" class="btn btn-primary">View</a>
				</td>
			</tr>
				<?php }} else { ?>
					<tr><td colspan="5"> <h2>No data...</h2>
					</td></tr>
				<?php } ?>

		</table>
	</div>
</div>
<?php include 'inc/footer.php'?>