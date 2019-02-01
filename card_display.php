<?php 
$db = mysqli_connect('localhost', 'root', '', 'registration');
$name="SELECT * FROM movies ORDER BY(rel_date)";
$result=mysqli_query($db,$name);
$c="SELECT COUNT(mov_id) FROM movies";
$count=mysqli_query($db,$c);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    margin-bottom: 30px;
    margin-left: 30%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
    margin-left: 5px;
    
}
button[name=info_btn] {
      padding: 2px 16px;
      margin-left: 20px;
      margin-bottom: 10px;
}
</style>
</head>
<body>
<!-- <script type="text/javascript">
  function sendRequest($var){
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "functions.php", true);
    xhttp.send("mov_title=" + $var);
  }
</script> -->

<!-- <div class="window-margin">
<div class="window"> -->
<h2 align="center"><b>UPCOMING MOVIES</b></h2>
<?php
$f=$count->fetch_assoc(); 
for($i=0; $i < $f["COUNT(mov_id)"] ; $i++) : ?>
  
    <div class="card">
      <table>
        <tr>
        <th></th>
        <th></th>
        </tr>
        <tr>
        	<?php $row = $result->fetch_assoc(); ?>
          <td>
            <img src="<?php echo $row["poster_link"];?>" alt="Poster Not Available" style="height: 50%">
          </td>
          <td>
          <div class="container">
            <?php if ($result->num_rows > 0) {
   
              echo '<h3>', "" . $row["mov_title"]. "<br>" , '</h3>', "Release Date: " .$row["rel_date"]. "<br>"."<br>";
              $name=$row["mov_title"];
            } ?> 
          </div>
        <div class="input-group">
          <a href="movie_info.php?parameter=<?php echo $name; ?>"  >
          <button type="submit" class="btn" name="info_btn" >Know More</button>
          </a>
        </div></td>
        </tr>
      </table>
    </div>
<?php endfor ?>
<!-- </div>
</div> -->
</body>
</html> 