<?php
	session_start();
	
	//create database connection
	include("../connect_db.php");
	
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
		
	include("../model/UserCheck.php");
	if($CurrentUserAdmin == 1){
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/client.css"/>
		<link rel="stylesheet" type="text/css" href="../css/aurna-lightbox.css"/>
		<title>Admin Dashboard</title>
	</head>
	<body>
	<script src="../js/aurna-lightbox.js"></script>
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
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="history.php">Your History</a></li>
		<li><a href="settings.php">Settings</a></li>
		<li><a class="active" href="../logout.php">Log Out</a></li>
	</ul>


	<div id='body'>
	</br>
			<?php
			$userid = $_COOKIE['userid'];
			if ($conn->query("SELECT name FROM users WHERE id='$userid'")->num_rows > 0) {
				// output data of each row
				if($row = $conn->query("SELECT * FROM users WHERE id='$userid'")->fetch_assoc()) {
					?>
					<h2 style="margin-left: 47px;">Welcome, <?php echo $row['name']; ?></h2>
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
						<h2 style="margin-left: 23px;">Admin Dashboard</h2>
						<h1 style="margin-left: 23px;">Waiting Appointments</h1>
					</div>
					<input type="text" id="appointmentSearch" placeholder="Type in Token Number" style="padding: 12px; margin-left: 24px; font-size: 23px;" onchange="LoadToken(this.value)"/>
					<button onclick="LoadToken(appointmentSearch.value)" style="padding: 12px; margin-left: 4px; font-size: 23px;">Load Token</button>
				</td>
				<td>
					<h2>Statistics:</h2>
					Lifetime Tokens: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM `tokens`"));?></br>
					Pending Patients: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM `tokens` WHERE `attendance`='' AND `validity`='valid'"));?></br>
					Prescripted Patients: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM `tokens` WHERE `attendance`='yes'"));?></br>
					Declined Tokens: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM `tokens` WHERE `attendance`='no'"));?></br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="0" id="dataTable1" style=" padding: 20px;">
					<?php
						mysqli_set_charset($con,"utf8");
						$sql        = "SELECT * FROM `tokens` WHERE validity='valid' ORDER BY `token_id` DESC LIMIT 1" ;
						$result		= mysqli_query($con, $sql);
						$TokenCount = 0;
						if(!$result){
							echo mysqli_error($con);
						}
						else{
							while($rows=mysqli_fetch_array($result)){
								$TokenCount++;
								if($row=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `tokens` INNER JOIN `users` ON `tokens`.`user_id`=`users`.`id` WHERE validity='valid' ORDER BY `token_id` DESC LIMIT 1"), MYSQLI_ASSOC)){
						?>		
									<tr class="hoverROw">
										<td id="col1">
										<?php
											$date = $row['date'];
											$name = $row['name'];
											$gender = $row['gender'];

										?>
											</br>
											<span class="appointmentTitle">Token ID <i>#<?php echo $row['token_id'];?></i></span>
											</br>
											</br>
											<b>Transaction ID: </b> <?php echo $row['transaction_id'];?></br>
											<b>Date: </b> <?php echo date("F j, Y", strtotime($date));?>, <?php echo date("D", strtotime($date))?></br></br>
											<b>Name: </b> <?php echo $name;?></br>
											<b>Gender: </b> <?php echo $gender;?></br>
											<hr>
											<u><h3>Details: </h3></u>
											<p><?php echo $row['problem']?></p>
										</td>
										<td id="col2">
											<h3>Prescription</h3>
											<textarea id="prescription<?php echo $row['token_id'];?>" style="padding: 20px;width: 89%;height: 127px;font-family: Trebuchet MS;font-size: 16px;scroll-behavior: smooth;margin-bottom: 6px;overflow-y: scroll;" placeholder='Prescription'></textarea></br>
											<button onclick="TokenPresent(<?php echo $row['token_id'];?>)" id="AprBtn<?php echo $row['token_id'];?>" class="button-10">Patient Present</button>
											<button onclick="TokenAbsent(<?php echo $row['token_id'];?>)" id="DecBtn<?php echo $row['token_id'];?>" class="button-11">Patient Absent</button>
										</td>
									</tr>
						<?php
								}
							}
							if($TokenCount == 0){
								?>
								<center>
								<h1>No Waiting Tokens!</h1>
								</center>
								<?php
							}
						}

					?>
					</table>
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
	

		function LoadToken(id){

			let Table = document.getElementById('dataTable1');

			var	xmlhttp=new XMLHttpRequest();
		
			xmlhttp.onreadystatechange=function() {
				if(this.readyState == 4 && this.status == 200) {
					Table.innerHTML = this.responseText;
				}		
			};

			xmlhttp.open("GET","ajax.php?data=searchToken&token_id="+id, true);
			xmlhttp.send();
		}	


		function TokenPresent(id){
			let prescription = 'prescription'+id;
			let AprBtn = 'AprBtn'+id;
			let DecBtn = 'DecBtn'+id;
			let PrescriptionText = document.getElementById(prescription).value;
			
			console.log('ID: ' + id);
			console.log('Prescription: ' + PrescriptionText);
			
			document.getElementById(AprBtn).setAttribute("disabled","true");
			document.getElementById(DecBtn).setAttribute("disabled","true");
			
			var	xmlhttp=new XMLHttpRequest();
		
			xmlhttp.onreadystatechange=function() {
				if(this.readyState == 4 && this.status == 200) {
						setTimeout(function(){
							location.reload();
						}, 500);
				}		
			};

			xmlhttp.open("GET","ajax.php?data=ApproveToken&token_id="+id+"&prescription="+PrescriptionText, true);
			xmlhttp.send();
		}
		


		function TokenAbsent(id){
			let prescription = 'prescription'+id;
			let AprBtn = 'AprBtn'+id;
			let DecBtn = 'DecBtn'+id;
			
			document.getElementById(AprBtn).setAttribute("disabled","true");
			document.getElementById(DecBtn).setAttribute("disabled","true");
			
			var	xmlhttp=new XMLHttpRequest();
		
			xmlhttp.onreadystatechange=function() {
				if(this.readyState == 4 && this.status == 200) {
						setTimeout(function(){
							document.reload();
						}, 500);
				}		
			};
			

			xmlhttp.open("GET","ajax.php?data=DeclineToken&token_id="+id, true);
			xmlhttp.send();
		}

	
	
	</script>
	</body>
	</html>


<?php 	}}	else { echo "<script>window.open('../login.php','_self')</script>"; } ?>