<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Movie</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
  <?php include('nav_admin.php') ?>
	<style>
    .header {
      background: #003366;
    }
    button[name=Upload_Now] {
      background: #003366;
      margin-top: 10px;
    }
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Add Movie</h2>
	</div>
			<form action="home.php" enctype="multipart/form-data" method="post">
        <div class="input-group">
          <label>Movie Name</label>
          <input type="text" name="moviename" id="moviename" value="<?php echo $moviename ?>">
        </div>
        <div class="input-group">
          <label>Description</label>
          <input type="text" name="description" id="description" value="<?php echo $description ?>">
        </div>
        <div class="input-group">
        	<?php include('date1.php'); ?>
        </div>
      	<div>
          <label>Insert Poster</label>
          <input name="uploadedimage" type="file">
          <button name="Upload_Now" type="submit" value="Upload Image" class="btn">Add Movie</button>
        </div>
      </form>
</body>
</html>