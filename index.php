<?php
include('functions.php');

if (isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Homepage</title>
	<style type="text/css">
		.success {
  margin-left: 420px;
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
  width: 500px;
}
	</style>
	 <?php include('nav2.php') ?>
</head>
<body>
	<div class="content">	 
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3 align="center">
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<h2 align="center"><strong><?php echo "Welcome ",$_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
					</small>
					</h2>

				<?php endif ?>
			</div>
		</div>
	</div>

	<?php include ('slider.php'); ?> 
	<?php include('card_display.php'); ?>

</body>
</html>