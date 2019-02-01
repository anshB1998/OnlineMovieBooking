<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Show</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include('nav_admin.php') ?>
	<style>
		.header {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Create Show</h2>
	</div>
	<form method="post" action="create_show.php" enctype="multipart/form-data">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Movie ID</label>
			<input type="text" name="movieid" value="<?php echo $movie_id; ?>">
		</div>
		<div class="input-group">
        	<?php include('date.php'); ?>
        </div>
		<div class="input-group">
			<label>ShowTime</label>
			<input type="timing" name="timing" value="<?php echo $show_timing; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="show_btn"> + Add Show</button>
		</div>
	</form>
</body>
</html>


