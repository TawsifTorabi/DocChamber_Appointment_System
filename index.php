<?php
	session_start();
	
	//create database connection
	include("connect_db.php");
	
	//create blank variable
	$getsessionID = "";
	$message = "";
	
	
	//call session data
	if(isset($_SESSION['librarypanel'])){	
		//get session id from browser and update variable
		$getsessionID = $_SESSION['librarypanel'];
	}
	
	//set the validity mode for session data
	$validity = mysqli_real_escape_string($con,"valid");
	
	//verify session id
	if(mysqli_num_rows(mysqli_query($con, "select * from sessions where session_id='$getsessionID' AND validity='$validity' ORDER BY `id` DESC LIMIT 1"))> 0){
		$UserLoggedIn = 1;
	} else {
		$UserLoggedIn = 0;
	}
		
?>

<!doctype html>
<html lang="en">
	<meta charset="utf-8">
	<head>
		<title>UIU Medical Center</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="images/favicon.png" rel="icon" type="image/png"/>
		<link href="css/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<script src='js/main.js' type='text/javascript'></script>
		<div class="topnav" id="myTopnav1">
		  <a href="index.php" class="active">Home</a>
		  <a href="hospitals.php">Hospitals nearby UIU Campus</a>
		  <?php if($UserLoggedIn == 1){?>
			<a href="dashboard.php">Dashboard</a>
			<a href="logout.php">Log Out</a>
		  <?php }else if(($UserLoggedIn == 0)){ ?>
			<a href="signup.php">Sign Up</a>
			<a href="login.php">Log in</a>
		  <?php } ?>
		  
		  <!--div class="dropdown">
			<button class="dropbtn">Dropdown 
			  <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
			  <a href="#">Link 1</a>
			  <a href="#">Link 2</a>
			  <a href="#">Link 3</a>
			</div>
		  </div--> 
		  <a href="about.php">About</a>
		  <a href="javascript:void(0);" style="font-size:15px;float: right;" class="icon" onclick="MenuToggle()">&#9776;</a>
		</div>


		</br>
		</br>
				<center>
				<div class="headnamecontainer_1">
					<div class='clearfix'></div>
					<!--div style="display: inline-block;vertical-align: bottom;"><img class="profilephoto" src="images/myphoto.jpg"></div-->
					
					<div style="display: inline-block;text-align: left;margin-left: 32px;">
						<span class="thishead">AUTOMATED APPOINTMENT SYSTEM OF</span>
						<br>
						<span class="namehead">UIU MEDICAL CENTER</span>
						<br>
						<p class="parentdetail">
							This is a Web Application programmed with PHP to automate a appointment booking and token update system </br>
							for United International University Medical Center. </br> 
							With this application, an student, staff or user can directly generate a token from this application.</br>
							And can get a live update of the current running token.</br>
						</p>
					</div>
					</br>
					</br>
					</br>
					  <?php if($UserLoggedIn == 1){?>
						<a class="button-10" href="dashboard.php" style="text-decoration: none;">Make an Appointment Token!</a>
					  <?php }else if(($UserLoggedIn == 0)){ ?>
						<a class="button-10" href="login.php" style="text-decoration: none;">Make an Appointment Token!</a>
					  <?php } ?>
				</div>
		</center>

<center>
</center>
		<center>

				<?php
				if ($resultQ = $conn->query("SELECT * FROM staffs WHERE type='doctor' ORDER BY id LIMIT 1")->num_rows > 0) {
					// output data of each row
					if($rowDoctorDetail = $conn->query("SELECT * FROM staffs WHERE type='doctor'  ORDER BY id DESC LIMIT 1")->fetch_assoc()) {
				?>
					<div class="headnamecontainer">
						</br>
						</br>
						<div style="display: inline-block;vertical-align: bottom;"><img class="profilephoto" src="images/myphoto.jpg"></div>
						
						<div style="display: inline-block;text-align: left;margin-left: 32px;">
							<span class="thishead">AVAILABLE DOCTOR</span>
							<br>
							<span class="namehead"><?php echo $rowDoctorDetail['first_name'] ?> <?php echo $rowDoctorDetail['last_name'] ?></span>
							<br>
							<p class="parentdetail">
							<?php echo $rowDoctorDetail['bio'] ?>
							</p>
							</br>
							<a class="button-10" href="profile.php?id=<?php echo $rowDoctorDetail['id'] ?>" style="text-decoration: none;">See Profile</a>
							<a class="button-10" href="about.php" style="text-decoration: none;">Contact</a>
						</div>
					</div>
				<?php }}else{ ?>
					<div class="headnamecontainer" style="font-family: Trebuchet MS;">
						</br>
						</br>
						<h1>No Doctor Available!</h1>
						<h3>Contact with UIU Medical Center Now!</h3>
					</div>
			<?php } ?>
		</center>		
		
		</br>
		</br>
		</br>
		
		
	</body>
</html>

