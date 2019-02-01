<?php include('functions.php'); ?>
<!DOCTYPE  html>
<html>
<head>
	<title>Movies</title>
	<meta  content='text/html;  charset=UTF-8'  http-equiv='Content-Type'/>
	<link  rel="stylesheet"  type="text/css"  href="cstyle.css"  />
	<?php include('nav2.php') ?>
	<style type="text/css">
	.content {
  width: 70%;
  height: 90%;
  margin: 0px auto;
  padding: 35px;
  border: 1px solid #B0C4DE;
  background: white;
}

	</style>
</head>
<body>
	<?php
	$get=$_GET["parameter"];
	if($get)
	{
	$query="SELECT mov_id,mov_title,mov_desc,rel_date,poster_link FROM movies WHERE mov_title='$get'";
	$result=mysqli_query($db,$query);
	$row=$result->fetch_assoc();
	$x=(string) $row["mov_id"];
	$q="SELECT show_date, show_time FROM shows WHERE movie_id=$x";
	$r=mysqli_query($db,$q);
	
} ?>	
			<div class="content">
			<div align="left" id="tb-name"><p><img src="<?php echo $row["poster_link"];?>" style="height: 70%"></p></div>
			<div  align="left"  id="tb-name"><b><?php  echo  "" . $row["mov_title"]. "<br>" ."<br>"; ?></b></div>
			<div  align="left"  id="tb-name"><b>Summary: </b><?php  echo  "" . $row["mov_desc"]. "<br>". "<br>";  ?></div>
			<div  align="left"  id="tb-name"><b>Release Date: </b><?php  echo  "" . $row["rel_date"]. "<br>". "<br>";  ?></div>
			<div style="float: left;"><b>Show Times: </b>
				<?php while($row1=$r->fetch_assoc()) :?>
				<?php echo  "" . $row1["show_date"]. "  " ;
				$date=$row1["show_date"];
				$time=$row1["show_time"];
				$p=$x.'|'.$date.'|'.$time;
				?>
				<a href="seat.php?param=<?php echo $p; ?>" >
				<button type="submit" class="btn" name="time_btn"><?php echo  "" . $row1["show_time"]. "  " ;?></button>
          		</a>
          		<?php endwhile; ?> 
			</div>
			</div>
</body>
</html>
