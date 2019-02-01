<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// variable declaration
$username = "";
$email    = "";
$moviename="";
$movieid="";
$description="";
$target_path="";
$temp_name="";
$rel_date="";
$search="";
$show_date="";
$movie_id="";
$show_timing="";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

if (isset($_POST['del_btn'])) {
	del_hist();
	}

if (isset($_POST['show_btn'])) {
	showtime();
}

if (isset($_POST['Upload_Now'])) {
	$host="localhost";
    $databasename="registration";
    $user="root";
    $pass="";
    $conn=mysql_connect($host,$user,$pass);

    if($conn) {
      $db_selected = mysql_select_db($databasename, $conn);
      if (!$db_selected) {
        die ('Cant use foo : ' . mysql_error());
      }
    }
    else {
      die('Not connected : ' . mysql_error());
    }

    	$moviename    =  e($_POST['moviename']);
	$description  =  e($_POST['description']);
	$rel_date  =  e($_POST['rel_date']);

 	movies();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created";
			header('location: home.php');
		}
		else {
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}	


function movies(){
	// call these variables with the global keyword to make them available in function
	global $errors, $moviename, $movieid, $description, $temp_name, $target_path,$rel_date;

	// form validation: ensure that the form is correctly filled
	if (empty($moviename)) { 
		array_push($errors, "Title is required"); 
	}
	// if (empty($movieid)) { 
	// 	array_push($errors, "ID is required"); 
	// }
	if (empty($description)) { 
		array_push($errors, "Description is required"); 
	}
	if (empty($rel_date)) { 
		array_push($errors, "Release date is required"); 
	}
if (count($errors == 0)) {
	if (!empty($_FILES["uploadedimage"]["name"])) {
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=$_FILES["uploadedimage"]["name"];
    $target_path = "images/".$imagename;
    if(move_uploaded_file($temp_name, $target_path)) {
      $query_upload="INSERT INTO movies (mov_title, mov_desc, rel_date, poster_link) VALUES ('$moviename','$description','$rel_date','".$target_path."')";
        mysql_query($query_upload)or die("error in $query_upload == ----> ".mysql_error());
      $_SESSION['success'] = "Movie added successfully!!";
    }
    else{

      exit("Error While uploading image on the server");
    }
  }
  }
}

  function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    switch($imagetype) {
      case 'image/bmp': return '.bmp';
      case 'image/gif': return '.gif';
      case 'image/jpeg': return '.jpg';
      case 'image/png': return '.png';
      default: return false;
    }
  }


function seat_insertion($mov,$dat,$tim){
global $db;
$mov_id=(int) $mov;
$num=$_SESSION['user']['id'];
$selected=true;
$checkbox1=$_POST['chck1'];
		for($i=0; $i<sizeof($checkbox1); $i++){
			$q="INSERT INTO history(user_id,seat_id) VALUES('$num','$checkbox1[$i]')";
			mysqli_query($db,$q);
			$query="UPDATE showtiming SET booked='$selected' WHERE s_date='$dat' AND s_time='$tim' AND mov_id='$mov_id' AND seat_id='$checkbox1[$i]'" ;
			mysqli_query($db,$query);
		}
}

function seat_checked($mov,$dat,$tim,$s)
{
	global $db;
	$q="SELECT seat_id FROM showtiming WHERE booked=1 AND s_date='$dat' AND s_time='$tim' AND mov_id='$mov' AND seat_id='".$s."'";
	$result= mysqli_query($db, $q);
	if($result->num_rows == 1)
		return "disabled";
}

function showtime(){
	global $db, $errors;

	// grap form values
	$movie_id = e($_POST['movieid']);
	$show_timing = e($_POST['timing']);
	$show_date = e($_POST['show_date']);

	// make sure form is filled properly
	if (empty($movie_id)) {
		array_push($errors, "Movie ID is required");
	}
	if (empty($show_date)) {
		array_push($errors, "Showdate is required");
	}
	if (empty($show_timing)) {
		array_push($errors, "Showtime is required");
	}

		if (count($errors) == 0) {
		$query = "INSERT INTO shows (movie_id, show_date, show_time) 
				VALUES('$movie_id', '$show_date, '$show_timing')";
		mysqli_query($db, $query);
		$_SESSION['success']  = "New showtime successfully added";
		header('location: home.php');
	}
}

function del_hist(){
		global $db;
		$get=$_SESSION['user']['id'];
		$q="DELETE FROM history WHERE user_id='$get'";
		$result=mysqli_query($db,$q);
	}