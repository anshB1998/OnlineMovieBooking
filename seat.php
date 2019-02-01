<?php include('functions.php');
global $x;
$x=array();
$get=$_GET["param"];
if($get)
{
 $x=explode("|", $get);
}
if (isset($_POST['seat_btn'])) {
  seat_insertion($x[0],$x[1],$x[2]);
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('nav2.php') ?>
<!--   <link rel="stylesheet" type="text/css" href="seat.css"> -->
  <title>Please select a seat</title>
  <script type="text/javascript">
var CheckboxUncheckedImage = new Image(); // Declare an image variable.
var CheckboxCheckedImage = new Image(); // Declare another image variable.

CheckboxUncheckedImage.src = "images/available.png";
CheckboxCheckedImage.src = "images/selected.png";

function CheckboxClicked(imageid,checkboxid) {

// Use imageid to find the image that was clicked.

var image = document.getElementById(imageid);

// Check if the clicked image has the same src as 
//    the one representing a checked checkbox.

if(image.src == CheckboxCheckedImage.src) {

// If yes, switch to image representing unchecked and 
//    also change the checkbox form field's checked 
//    status to false (unchecked).

   image.src = CheckboxUncheckedImage.src;
   document.getElementById(checkboxid).checked = false;
   }

else {

// Otherwise, switch to image representing checked and 
//    also change the checkbox form field's checked 
//    status to true (checked).

   image.src = CheckboxCheckedImage.src;
   document.getElementById(checkboxid).checked = true;
   }

// Return value false to keep the browser from doing 
//    anything else with the click.

return false;
}
</script>


  <style>
    .header {
      background: #003366;
    }
    button[name=seat_btn] {
      background: #003366;
      margin-left: 160px;
    }

	*,*:before,*:after {
  box-sizing: border-box;
}
html {
  font-size: 16px;
}
*{
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto;
  color: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  padding: 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}

.plane {
  margin: 20px auto;
  max-width: 400px;
}

.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  border: none;
  border-radius: 5px;
}


.exit {
  position: relative;
  height: 50px;
  &:before,
  &:after {
    content: "EXIT";
    font-size: 14px;
    line-height: 18px;
    padding: 0px 2px;
    font-family: "Arial Narrow", Arial, sans-serif;
    display: block;
    position: absolute;
    background: green;
    color: white;
    top: 50%;
    transform: translate(0, -50%);
  }
  &:before {
    left: 0;
  }
  &:after {
    right: 0;
  }
}


ol {
  list-style :none;
  padding: 0;
  margin: 0;
}

.headings {
  margin-top: 10px;
  margin-left: -10px;
}

.row {
  
}

.seats {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: flex-start;  
}

.seat {
  display: flex;
  flex: 0 0 14.28571428571429%;
  padding: 5px;
  position: relative;  
  text-align: center;
  &:nth-child(3) {
    margin-right: 14.28571428571429%;
  }

.seatlayout{
  input[type=checkbox][id="55"] {
    position: absolute;
    opacity: 0;
  }
  input[type=checkbox][id="55"]:checked {
    + label {
      background: #bada55;      
      -webkit-animation-name: rubberBand;
          animation-name: rubberBand;
      animation-duration: 300ms;
      animation-fill-mode: both;
    }
  }
  input[type=checkbox]:disabled {
    + label {
      background: black;
      text-indent: -9999px;
      overflow: hidden;
      &:after {
        content: "X";
        text-indent: 0;
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translate(-50%, 0%);
      }
      &:hover {
        box-shadow: none;
        cursor: not-allowed;
      }
    }
  }
}
  label {    
    display: block;
    position: relative;    
    width: 100%;    
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    line-height: 1.5rem;
    padding: 4px 0;
    background: #F42536;
    border-radius: 5px;
    animation-duration: 300ms;
    animation-fill-mode: both;
    
    &:before {
      content: "";
      position: absolute;
      width: 75%;
      height: 75%;
      top: 1px;
      left: 50%;
      transform: translate(-50%, 0%);
      background: rgba(255,255,255,.4);
      border-radius: 3px;
    }
    &:hover {
      cursor: pointer;
      box-shadow: 0 0 0px 2px #5C6AFF;
    }
    
  }
}
  </style>
</head>
<body>
  <div class="header">
    <h3>Screen This Way</h3>
  </div>
  <div class="plane">
  <div>
  </div>
    <form method="post">
  <div class="seatlayout">
  <ol class="cabin fuselage">
    <li class="row row--1">
      <ol class="seats" type="A">
      	<li class="headings">A</li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A1" id="A1" <?php echo seat_checked($x[0],$x[1],$x[2],"A1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A1")=="disabled"): ?>
			<img id="CheckboxImageID1" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID1" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID1','A1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A2" id="A2" <?php echo seat_checked($x[0],$x[1],$x[2],"A2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A2")=="disabled"): ?>
			<img id="CheckboxImageID2" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID2" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID2','A2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A3" id="A3" <?php echo seat_checked($x[0],$x[1],$x[2],"A3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A3")=="disabled"): ?>
			<img id="CheckboxImageID3" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID3" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID3','A3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A4" id="A4" <?php echo seat_checked($x[0],$x[1],$x[2],"A4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A4")=="disabled"): ?>
			<img id="CheckboxImageID4" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID4" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID4','A4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A5" id="A5" <?php echo seat_checked($x[0],$x[1],$x[2],"A5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A5")=="disabled"): ?>
			<img id="CheckboxImageID5" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID5" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID5','A5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A6" id="A6" <?php echo seat_checked($x[0],$x[1],$x[2],"A6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A6")=="disabled"): ?>
			<img id="CheckboxImageID6" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID6" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID6','A6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          	<span style="display:none;">
				<input type="checkbox" name="chck1[]" value="A7" id="A7" <?php echo seat_checked($x[0],$x[1],$x[2],"A7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"A7")=="disabled"): ?>
			<img id="CheckboxImageID7" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID7" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID7','A7')" style="cursor:pointer;">
		<?php endif; ?>
        </li> 
      </ol>
    </li>
    	<li class="row row--2">
      <ol class="seats" type="A">
      	<li class="headings">B</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B1" id="B1" <?php echo seat_checked($x[0],$x[1],$x[2],"B1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B1")=="disabled"): ?>
			<img id="CheckboxImageID8" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID8" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID8','B1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B2" id="B2" <?php echo seat_checked($x[0],$x[1],$x[2],"B2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B2")=="disabled"): ?>
			<img id="CheckboxImageID9" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID9" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID9','B2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B3" id="B3" <?php echo seat_checked($x[0],$x[1],$x[2],"B3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B3")=="disabled"): ?>
			<img id="CheckboxImageID10" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID10" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID10','B3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B4" id="B4" <?php echo seat_checked($x[0],$x[1],$x[2],"B4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B4")=="disabled"): ?>
			<img id="CheckboxImageID11" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID11" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID11','B4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B5" id="B5" <?php echo seat_checked("B5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B5")=="disabled"): ?>
			<img id="CheckboxImageID12" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID12" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID12','B5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B6" id="B6" <?php echo seat_checked("B6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B6")=="disabled"): ?>
			<img id="CheckboxImageID13" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID13" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID13','B6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="B7" id="B7" <?php echo seat_checked("B7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"B7")=="disabled"): ?>
			<img id="CheckboxImageID14" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID14" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID14','B7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--3">
      <ol class="seats" type="A">
      	<li class="headings">C</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C1" id="C1" <?php echo seat_checked("C1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C1")=="disabled"): ?>
			<img id="CheckboxImageID15" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID15" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID15','C1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C2" id="C2" <?php echo seat_checked("C2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C2")=="disabled"): ?>
			<img id="CheckboxImageID16" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID16" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID16','C2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C3" id="C3" <?php echo seat_checked($x[0],$x[1],$x[2],"C3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C3")=="disabled"): ?>
			<img id="CheckboxImageID17" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID17" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID17','C3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C4" id="C4" <?php echo seat_checked($x[0],$x[1],$x[2],"C4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C4")=="disabled"): ?>
			<img id="CheckboxImageID18" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID18" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID18','C4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C5" id="C5" <?php echo seat_checked($x[0],$x[1],$x[2],"C5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C5")=="disabled"): ?>
			<img id="CheckboxImageID19" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID19" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID19','C5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C6" id="C6" <?php echo seat_checked($x[0],$x[1],$x[2],"C6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C6")=="disabled"): ?>
			<img id="CheckboxImageID20" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID20" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID20','C6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="C7" id="C7" <?php echo seat_checked($x[0],$x[1],$x[2],"C7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"C7")=="disabled"): ?>
			<img id="CheckboxImageID21" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID21" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID21','C7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--4">
      <ol class="seats" type="A">
      	<li class="headings">D</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D1" id="D1" <?php echo seat_checked($x[0],$x[1],$x[2],"D1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D1")=="disabled"): ?>
			<img id="CheckboxImageID22" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID22" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID22','D1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D2" id="D2" <?php echo seat_checked($x[0],$x[1],$x[2],"D2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D2")=="disabled"): ?>
			<img id="CheckboxImageID23" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID23" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID23','D2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D3" id="D3" <?php echo seat_checked($x[0],$x[1],$x[2],"D3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D3")=="disabled"): ?>
			<img id="CheckboxImageID24" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID24" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID24','D3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D4" id="D4" <?php echo seat_checked($x[0],$x[1],$x[2],"D4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D4")=="disabled"): ?>
			<img id="CheckboxImageID25" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID25" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID25','D4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D5" id="D5" <?php echo seat_checked($x[0],$x[1],$x[2],"D5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D5")=="disabled"): ?>
			<img id="CheckboxImageID26" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID26" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID26','D5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D6" id="D6" <?php echo seat_checked($x[0],$x[1],$x[2],"D6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D6")=="disabled"): ?>
			<img id="CheckboxImageID27" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID27" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID27','D6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="D7" id="D7" <?php echo seat_checked($x[0],$x[1],$x[2],"D7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"D7")=="disabled"): ?>
			<img id="CheckboxImageID28" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID28" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID28','D7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--5">
      <ol class="seats" type="A">
      	<li class="headings">E</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E1" id="E1" <?php echo seat_checked($x[0],$x[1],$x[2],"E1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E1")=="disabled"): ?>
			<img id="CheckboxImageID29" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID29" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID29','E1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E2" id="E2" <?php echo seat_checked($x[0],$x[1],$x[2],"E2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E2")=="disabled"): ?>
			<img id="CheckboxImageID30" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID30" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID30','E2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E3" id="E3" <?php echo seat_checked($x[0],$x[1],$x[2],"E3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E3")=="disabled"): ?>
			<img id="CheckboxImageID31" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID31" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID31','E3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E4" id="E4" <?php echo seat_checked($x[0],$x[1],$x[2],"E4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E4")=="disabled"): ?>
			<img id="CheckboxImageID32" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID32" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID32','E4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E5" id="E5" <?php echo seat_checked($x[0],$x[1],$x[2],"E5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E5")=="disabled"): ?>
			<img id="CheckboxImageID33" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID33" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID33','E5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E6" id="E6" <?php echo seat_checked($x[0],$x[1],$x[2],"E6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E6")=="disabled"): ?>
			<img id="CheckboxImageID34" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID34" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID34','E6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="E7" id="E7" <?php echo seat_checked($x[0],$x[1],$x[2],"E7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"E7")=="disabled"): ?>
			<img id="CheckboxImageID35" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID35" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID35','E7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--6">
      <ol class="seats" type="A">
      	<li class="headings">F</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F1" id="F1" <?php echo seat_checked($x[0],$x[1],$x[2],"F1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F1")=="disabled"): ?>
			<img id="CheckboxImageID36" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID36" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID36','F1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F2" id="F2" <?php echo seat_checked($x[0],$x[1],$x[2],"F2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F2")=="disabled"): ?>
			<img id="CheckboxImageID37" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID37" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID37','F2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F3" id="F3" <?php echo seat_checked($x[0],$x[1],$x[2],"F3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F3")=="disabled"): ?>
			<img id="CheckboxImageID38" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID38" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID38','F3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F4" id="F4" <?php echo seat_checked($x[0],$x[1],$x[2],"F4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F4")=="disabled"): ?>
			<img id="CheckboxImageID39" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID39" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID39','F4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F5" id="F5" <?php echo seat_checked($x[0],$x[1],$x[2],"F5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F5")=="disabled"): ?>
			<img id="CheckboxImageID40" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID40" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID40','F5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F6" id="F6" <?php echo seat_checked($x[0],$x[1],$x[2],"F6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F6")=="disabled"): ?>
			<img id="CheckboxImageID41" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID41" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID41','F6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="F7" id="F7" <?php echo seat_checked($x[0],$x[1],$x[2],"F7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"F7")=="disabled"): ?>
			<img id="CheckboxImageID42" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID42" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID42','F7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--7">
      <ol class="seats" type="A">
      	<li class="headings">G</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G1" id="G1" <?php echo seat_checked($x[0],$x[1],$x[2],"G1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G1")=="disabled"): ?>
			<img id="CheckboxImageID43" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID43" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID43','G1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G2" id="G2" <?php echo seat_checked($x[0],$x[1],$x[2],"G2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G2")=="disabled"): ?>
			<img id="CheckboxImageID44" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID44" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID44','G2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G3" id="G3" <?php echo seat_checked($x[0],$x[1],$x[2],"G3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G3")=="disabled"): ?>
			<img id="CheckboxImageID45" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID45" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID45','G3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G4" id="G4" <?php echo seat_checked($x[0],$x[1],$x[2],"G4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G4")=="disabled"): ?>
			<img id="CheckboxImageID46" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID46" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID46','G4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G5" id="G5" <?php echo seat_checked($x[0],$x[1],$x[2],"G5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G5")=="disabled"): ?>
			<img id="CheckboxImageID47" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID47" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID47','G5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G6" id="G6" <?php echo seat_checked($x[0],$x[1],$x[2],"G6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G6")=="disabled"): ?>
			<img id="CheckboxImageID48" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID48" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID48','G6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="G7" id="G7" <?php echo seat_checked($x[0],$x[1],$x[2],"G7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"G7")=="disabled"): ?>
			<img id="CheckboxImageID49" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID49" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID49','G7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--8">
      <ol class="seats" type="A">
      	<li class="headings">H</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H1" id="H1" <?php echo seat_checked($x[0],$x[1],$x[2],"H1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H1")=="disabled"): ?>
			<img id="CheckboxImageID50" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID50" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID50','H1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H2" id="H2" <?php echo seat_checked($x[0],$x[1],$x[2],"H2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H2")=="disabled"): ?>
			<img id="CheckboxImageID51" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID51" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID51','H2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H3" id="H3" <?php echo seat_checked($x[0],$x[1],$x[2],"H3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H3")=="disabled"): ?>
			<img id="CheckboxImageID52" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID52" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID52','H3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H4" id="H4" <?php echo seat_checked($x[0],$x[1],$x[2],"H4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H4")=="disabled"): ?>
			<img id="CheckboxImageID53" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID53" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID53','H4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H5" id="H5" <?php echo seat_checked($x[0],$x[1],$x[2],"H5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H5")=="disabled"): ?>
			<img id="CheckboxImageID54" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID54" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID54','H5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H6" id="H6" <?php echo seat_checked($x[0],$x[1],$x[2],"H6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H6")=="disabled"): ?>
			<img id="CheckboxImageID55" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID55" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID55','H6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="H7" id="H7" <?php echo seat_checked($x[0],$x[1],$x[2],"H7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"H7")=="disabled"): ?>
			<img id="CheckboxImageID56" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID56" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID56','H7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--9">
      <ol class="seats" type="A">
      	<li class="headings">I</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I1" id="I1" <?php echo seat_checked($x[0],$x[1],$x[2],"I1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I1")=="disabled"): ?>
			<img id="CheckboxImageID57" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID57" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID57','I1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I2" id="I2" <?php echo seat_checked($x[0],$x[1],$x[2],"I2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I2")=="disabled"): ?>
			<img id="CheckboxImageID58" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID58" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID58','I2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I3" id="I3" <?php echo seat_checked($x[0],$x[1],$x[2],"I3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I3")=="disabled"): ?>
			<img id="CheckboxImageID59" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID59" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID59','I3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I4" id="I4" <?php echo seat_checked($x[0],$x[1],$x[2],"I4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I4")=="disabled"): ?>
			<img id="CheckboxImageID60" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID60" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID60','I4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I5" id="I5" <?php echo seat_checked($x[0],$x[1],$x[2],"I5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I5")=="disabled"): ?>
			<img id="CheckboxImageID61" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID61" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID61','I5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I6" id="I6" <?php echo seat_checked($x[0],$x[1],$x[2],"I6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I6")=="disabled"): ?>
			<img id="CheckboxImageID62" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID62" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID62','I6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="I7" id="I7" <?php echo seat_checked($x[0],$x[1],$x[2],"I7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"I7")=="disabled"): ?>
			<img id="CheckboxImageID63" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID63" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID63','I7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--10">
      <ol class="seats" type="A">
      	<li class="headings">J</li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J1" id="J1" <?php echo seat_checked($x[0],$x[1],$x[2],"J1"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J1")=="disabled"): ?>
			<img id="CheckboxImageID64" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID64" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID64','J1')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J2" id="J2" <?php echo seat_checked($x[0],$x[1],$x[2],"J2"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J2")=="disabled"): ?>
			<img id="CheckboxImageID65" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID65" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID65','J2')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J3" id="J3" <?php echo seat_checked($x[0],$x[1],$x[2],"J3"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J3")=="disabled"): ?>
			<img id="CheckboxImageID66" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID66" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID66','J3')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J4" id="J4" <?php echo seat_checked($x[0],$x[1],$x[2],"J4"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J4")=="disabled"): ?>
			<img id="CheckboxImageID67" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID67" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID67','J4')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J5" id="J5" <?php echo seat_checked($x[0],$x[1],$x[2],"J5"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J5")=="disabled"): ?>
			<img id="CheckboxImageID68" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID68" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID68','J5')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
        <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J6" id="J6" <?php echo seat_checked($x[0],$x[1],$x[2],"J6"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J6")=="disabled"): ?>
			<img id="CheckboxImageID69" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID69" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID69','J6')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
            <li class="seat">
          <span style="display:none;">
				<input type="checkbox" name="chck1[]" value="J7" id="J7" <?php echo seat_checked($x[0],$x[1],$x[2],"J7"); ?>>
			</span>
			<?php if(seat_checked($x[0],$x[1],$x[2],"J7")=="disabled"): ?>
			<img id="CheckboxImageID70" src="images/occupied.PNG" width="41" height="38" style="cursor:pointer;">
		<?php else: ?>
			<img id="CheckboxImageID70" src="images/available.PNG" width="41" height="38" onclick="CheckboxClicked('CheckboxImageID70','J7')" style="cursor:pointer;">
		<?php endif; ?>
        </li>
      </ol>
    </li>
        	<li class="row row--11">
      <ol class="seats" type="A">
        <li class="seat">1</li>
        <li class="seat">2</li>
        <li class="seat">3</li>
        <li class="seat">4</li>
        <li class="seat">5</li>
        <li class="seat">6</li>
        <li class="seat">7</li>
      </ol>
    </li>
  </ol>
</div>
<br>
	<div class="input-group">
      <button type="submit" class="btn" name="seat_btn">Book Tickets</button>
    </div>
</form>
  </div>
</body>
</html>