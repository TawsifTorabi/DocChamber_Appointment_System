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
		  <a href="index.php">Home</a>
		  <a href="hospitals.php" class="active">Hospitals nearby UIU Campus</a>
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
				<div class="headnamecontainer_1" style="height: 200px;">
					<div class='clearfix'></div>
					<!--div style="display: inline-block;vertical-align: bottom;"><img class="profilephoto" src="images/myphoto.jpg"></div-->
					
					<div style="display: inline-block;text-align: left;margin-left: 32px;">
						<span class="thishead">HOSPITALS AND CLINICS NEAR UIU CAMPUS</span>
						<br>
						<span class="namehead">NEARBY HOSPITALS</span>
						<br>
						<p class="parentdetail">
							List of renowned hospitals nearby United International University Campus </br> 
						</p>
					</div>
					</br>

				</div>
		</center>

		<center>
		
		
		<?php
		mysqli_set_charset($con,"utf8");
		$sql        = "SELECT * FROM `hospital` ORDER BY id DESC LIMIT 5";
		$result		= mysqli_query($con, $sql);
		if(!$result){
			echo mysqli_error($con);
		}
		else{
			while($rows=mysqli_fetch_array($result)){ ?>
				
					<div class="headnamecontainer">
						</br>
						</br>
						
						<div style="display: inline-block;vertical-align: bottom; float: right;">
							<!--img class="profilephoto" src="images/myphoto.jpg"-->
							<div class="mapouter">
								<div class="gmap_canvas">
								<iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
								src="https://maps.google.com/maps?width=300&amp;height=300&amp;hl=en&amp;q=<?php echo $rows['mapcode']?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">format json</a></div>
								<style>.mapouter{position:relative;text-align:right;width:100%;height:300px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:300px;}.gmap_iframe {height:300px!important;}</style>
							</div>
						</div>
						
						<div style="display: inline-block;text-align: left;margin-left: 32px; width: 45%;">
							<span class="namehead" style="font-size: 30px;"><?php echo $rows['name']?></span>
							<br>
							<span class="thishead"><?php echo $rows['location']?></span>
							<br>
							<p class="parentdetail" style="font-size: 19px;">
							Phone: <?php echo $rows['phone']?></br>
							Location: <?php echo $rows['location']?></br>
							Website: <a style="color: white;" target="_blank" href="<?php echo $rows['website']?>"><?php echo $rows['website']?></a></br>
							</p>
							</br>
							<a class="button-10" href="<?php echo $rows['website']?>" style="text-decoration: none;">View Website</a>
						</div>
					</div>
					<hr style="width: 100%; margin: 0; border: 3px solid purple;"/>
		<?php }
		}
	
	?>
		
		
		
		
		
		
		
		
		
		
		
		

				<?php
				if ($resultQ = $conn->query("SELECT * FROM staffs WHERE type='doctor' ORDER BY id LIMIT 1")->num_rows > 0) {
					// output data of each row
					if($rowDoctorDetail = $conn->query("SELECT * FROM staffs WHERE type='doctor'  ORDER BY id DESC LIMIT 1")->fetch_assoc()) {
				?>

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

