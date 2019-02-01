<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
     
    mysql_select_db("registration") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="cstyle.css"/>
    <?php include('nav2.php') ?>
</head>
<body>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM movies
            WHERE (`mov_title` LIKE '%".$query."%')") or die(mysql_error());
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)) {
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop ?>
                <div>
                <form  action="movie_info.php" method="POST" name="display">
                <div align="left" id="tb-name"><p><img alt="Poster Not Available" src="<?php echo $results["poster_link"];?>" style="height: 70%"></p></div>
                <div  align="left"  id="tb-name"><b><?php  echo  "" . $results["mov_title"]. "<br>" ."<br>"; ?></b></div>
                <div  align="left"  id="tb-name"><b>Summary: </b><?php  echo  "" . $results["mov_desc"]. "<br>". "<br>";  ?></div>
                <div  align="left"  id="tb-name"><b>Release Date: </b><?php  echo  "" . $results["rel_date"]. "<br>". "<br>";  ?></div>
                </form>
                </div>
               <!--  // posts results gotten from database -->
            <?php  }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Please enter a valid string!" ;
    }
?>
</body>
</html>