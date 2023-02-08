<?php
	session_start();
	
	//create database connection
	include("connect_db.php");
	
	//blank var
	$getsessionID = '';
	
	//call session data
	if(isset($_COOKIE['sessionid'])){
		//get session id from browser and update variable
		$getsessionID = $_COOKIE['sessionid'];
	}
	//set the validity mode for session data
	$validity = "valid";	
	//verify session id
	
		
	
	
	
	if(mysqli_num_rows(mysqli_query($con, "select * from sessions where session_id='$getsessionID' AND validity='$validity'"))> 0){
		
	include("model/UserCheck.php");
	if($CurrentUserAdmin == 1){
		header('Location: admin/index.php');
	}
	
	//Blood Donation Record
	$userID 	= $_COOKIE['userid'];
	$time = time();
	mysqli_set_charset($con,"utf8");

	// Check If User Donated 
	$row = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `blood_donation_record` WHERE `user_id`='$userID' ORDER BY `last_donated` DESC LIMIT 1"));
	if($row >= 1){
	
		//Get Last Donation Record
		if($row12 = $conn->query("SELECT * FROM `blood_donation_record` WHERE `user_id`='$userID'")->fetch_assoc()){
			$last_donated_time = $row12['last_donated'];
		}
		
		$last_donation_date = gmdate("Y-m-d", $last_donated_time);
		$current_date = gmdate("Y-m-d", $time);
		$datediff = $time - $last_donated_time;
		$dateCount = round($datediff / (60 * 60 * 24));
		
		if($dateCount > 119){								
			$BloodMsessageData = "You are Eligible to Donate!";
			$BloodBoolean = "true";
		}else{
			$BloodMsessageData = "4 Months Not Passed!";
			$BloodBoolean = "false";
		}
	}else{
			$BloodMsessageData = "You are Eligible to Donate!";
			$BloodBoolean = "true";
	}
		

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/client.css"/>
	<link rel="stylesheet" type="text/css" href="css/aurna-lightbox.css"/>
	<title>Your Dashboard</title>
</head>
<body>
<script src="js/aurna-lightbox.js"></script>
<ul>
	<li style='background: linear-gradient(to left,#2e76ff, #1abfff);'>
		<a href="javascript:void(0);">
		<?php
			$userid = $_COOKIE['userid'];
			if ($conn->query("SELECT name FROM users WHERE id='$userid'")->num_rows > 0) {
				// output data of each row
				if($row = $conn->query("SELECT name FROM users WHERE id='$userid'")->fetch_assoc()) {
					echo "<span>Welcome! <strong>".$row['name']."</strong></span><br>";
				}
			} else {
				echo "<b>Something Went Wrong!</b>";
			}
		?>
		</a>
	</li>
	 <!--class="activeMenu"-->
	<li><a href="index.php">Home</a></li>
	<li><a href="history.php">Your History</a></li>
	<li><a href="settings.php">Settings</a></li>
	<li><a class="active" href="logout.php">Log Out</a></li>
</ul>


<div id='body'>
</br>
		<?php
		$userid = $_COOKIE['userid'];
		if ($conn->query("SELECT name FROM users WHERE id='$userid'")->num_rows > 0) {
			// output data of each row
			if($row = $conn->query("SELECT * FROM users WHERE id='$userid'")->fetch_assoc()) {
				?>
				<h2 style="margin-left: 47px;">Welcome, <?php echo $row['name']; ?> (<?php echo $row['blood_group']; ?>)</h2>
				<?php
			}
		} else {
			echo "<b style='color:red;'>Authentication Error!</b>";
		}
	?>

	
	
<style>
.appointmentTitle {
    align-items: center;
    padding: 6px 14px;
    font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
    border-radius: 6px;
    border: none;
    color: #fff;
    background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
    background-origin: border-box;
    box-shadow: 0px 0.5px 1.5px rgb(54 122 246 / 25%), inset 0px 0.8px 0px -0.25px rgb(255 255 255 / 20%);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    transition: 0.9s;
	font-size: 18px;
}
</style>
<div class='mainCont'>
	
	<table border="1" style="width: 93%;" id="customers">
		<tr>
			<td>
				<div id="pageTitle">
					<h1 style="margin-left: 23px;">Your Current Appointment</h1>
				</div>
				<table border="0" id="dataTable1" style="width: 800px; padding: 20px;">
				<?php
					mysqli_set_charset($con,"utf8");
					$id    		= mysqli_real_escape_string($con, $_COOKIE['userid']);
					$sql        = "SELECT * FROM `tokens` WHERE `user_id`=$id AND validity='valid'" ;
					$result		= mysqli_query($con, $sql);
					$TokenCount = 0;
					if(!$result){
						echo mysqli_error($con);
					}
					else{
						while($rows=mysqli_fetch_array($result)){
							$TokenCount++;
							if($row=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `tokens` Where user_id=$id AND validity='valid'"), MYSQLI_ASSOC)){
					?>		
								<tr class="hoverROw">
									<td id="col1">
									<?php
										$date = $row['date'];

									?>
										</br>
										<span class="appointmentTitle">Token ID <i>#<?php echo $row['token_id'];?></i></span>
										</br>
										</br>
										<b>Date: </b> <?php echo date("F j, Y", strtotime($date));?>, <?php echo date("D", strtotime($date))?></br>
										<b>Transaction ID: </b> <?php echo $row['transaction_id'];?></br>
										<h3>Details: </h3>
										<p><?php echo $row['problem']?></p>
									</td>
									<td id="col2"> </td>
								</tr>
					<?php
							}
						}
						if($TokenCount == 0){
							?>
							<center>
							<h1>You have no Tokens!</h1>
							<button class="button-10" style="text-decoration: none;" onclick="aurnaIframe('create-new-token.php');">Get a Token</a>
							<script>document.getElementById('pageTitle').style.display='none';</script>
							</center>
							<?php
						}
					}

				?>
				</table>
			</td>
			<td>
				<h2>Blood Donation</h2>
				
				<?php
					// output data of blood group
					if($row = $conn->query("SELECT * FROM users WHERE id='$userid'")->fetch_assoc()) {
						?>
						Blood Group: <?php echo $row['blood_group']; ?></br></br>
						<?php
					}
				?>
				
				Keep a Record of you donation.</br>
				Click to check Eligiblity or,</br> Record your last Donation.</br></br>
				<span><?php echo $BloodMsessageData; ?></span></br></br>
				<button onclick="DonatedBlood()" id="yesDonate" class="button-10">I've Donated This Time</button></br></br>
				<span id="bloodMsg"></span></br></br>
			</td>
		</tr>
		<tr>
			<td colspan="2">Panel</td>
		</tr>
		
	</table>
</div>
</div>
<script>
	String.prototype.isMatch = function(s){
	   return this.match(s)!==null
	}
	let bloodBtnBool = <?php echo $BloodBoolean; ?>;
	if(bloodBtnBool == false){
		document.getElementById('yesDonate').setAttribute("disabled","true");
	}else{
		//Do Nothing
	}

	function DonatedBlood(){
		let BtnCont = 'yesDonate';
		let BloodMsg = 'bloodMsg';
		document.getElementById(BtnCont).setAttribute("disabled","true");
		document.getElementById(BtnCont).innerHTML='Registering...';
		let	xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if(this.readyState == 4 && this.status == 200) {
				document.getElementById(BtnCont).disabled='true';
				console.log(this.responseText);
				let RetJson = JSON.parse(this.responseText);
				if(RetJson.posted.isMatch('true')){
					document.getElementById(BtnCont).innerHTML='<i class="fa-solid fa-check"></i> Recorded';
				}
				if(RetJson.posted.isMatch('false')){
					document.getElementById(BtnCont).innerHTML='<i class="fa-solid fa-check"></i> Canceled';
				}
				document.getElementById(BloodMsg).innerHTML= RetJson.message;
			}else{
				
			}
		}
		xmlhttp.open("GET","ajax.php?data=DonateBloodRecord", true);
		xmlhttp.send();		
	}
</script>
</body>
</html>


<?php 	}	else { echo "<script>window.open('login.php','_self')</script>"; } ?>