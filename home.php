<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="cstyle.css">
	<?php include('nav_admin.php') ?>
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<div align="center">
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					</small>
				<?php endif ?>
			</div>
		</div>
		<div>
		<?php
$result = mysqli_query($db,"SELECT * FROM movies");
$result1 = mysqli_query($db,"SELECT * FROM users");

$c="SELECT COUNT(mov_id) FROM movies";
$count=mysqli_query($db,$c);
$f=$count->fetch_assoc();

$c1="SELECT COUNT(id) FROM users";
$count1=mysqli_query($db,$c1);
$f1=$count1->fetch_assoc();


echo "<b>" , "Users Table", "</b>", "<br>";
echo "Number of users in your database are: " .$f1["COUNT(id)"]. "<br>" ;
echo "<table border='1'>
<tr>
<th>Username</th>
<th>Email ID</th>
<th>User Type</th>
</tr>";

while($row1 = mysqli_fetch_array($result1))
{
echo "<tr>";
echo "<td>" . $row1['username'] . "</td>";
echo "<td>" . $row1['email'] . "</td>";
echo "<td>" . $row1['user_type'] . "</td>";
echo "</tr>";
}
echo "</table>";


echo "<b>" , "Movie Table", "</b>", "<br>";
echo "Number of movies in your database are: " .$f["COUNT(mov_id)"]. "<br>" ;
echo "<table border='1'>
<tr>
<th>Movie ID</th>
<th>Title</th>
<th>Release Date</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['mov_id'] . "</td>";
echo "<td>" . $row['mov_title'] . "</td>";
echo "<td>" . $row['rel_date'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>
		</div>
	</div>
</body>
</html>