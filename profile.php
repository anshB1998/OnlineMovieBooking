<?php include('functions.php'); ?>
<!DOCTYPE  html>
<html>
<head>
	
	<meta  content='text/html;  charset=UTF-8'  http-equiv='Content-Type'/>
	<link  rel="stylesheet"  type="text/css"  href="cstyle.css"  />
	<?php include('nav2.php') ?>
	<title>Profie Page</title>
</head>
<body>
	<div  id="contentbox">
 
		<div  id="signup">
			<div  id="signup-st">
				<form  action=""  method="POST"  id="signin"  id="reg">
					<div  id="reg-head"  class="headrg">Your  Profile</div>
						<table  border="0"  align="center"  cellpadding="2"  cellspacing="0">
							<tr  id="lg-1">
								<td  class="tl-1">
									<div  align="left"  id="tb-name"><b>Username: </b></div>
								</td>
								<td  class="tl-4"><?php  echo  $_SESSION['user']['username'];  ?></td>
							</tr>
 
							<tr  id="lg-1">
								<td  class="tl-1">
									<div  align="left"  id="tb-name"><b>Email  ID: </b></div>
								</td>
 								<td  class="tl-4"><?php  echo  $_SESSION['user']['email'];  ?></td>
							</tr>
 						</table>
				</form>
 			</div>
		</div>
	</div>

		<?php
		$get=$_SESSION['user']['id'];
	$query="SELECT * FROM history WHERE user_id='$get'";
	$result=mysqli_query($db,$query);
	  ?>	
 	<div>
		<form  action="profile.php" method="POST" name="display">
			<div  align="left"  id="tb-name"><b>Booked Tickets: </b>
				<?php  
				while ($row=$result->fetch_assoc()) {
				echo  "" . $row["seat_id"]. " "; } ?>
			</div>
			<div>
				<button type="submit" class="btn" name="del_btn">Delete History</button>
			</div>
		</form>
	</div>

</body>
</html>