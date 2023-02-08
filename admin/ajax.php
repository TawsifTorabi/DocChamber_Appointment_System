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
		
		
		

	
	//get requests for data
	if(isset($_GET['data'])){
		
			if($_GET['data'] == 'searchToken'){
		
				mysqli_set_charset($con,"utf8");
				$tokenID    = mysqli_real_escape_string($con, $_GET['token_id']);				
				$sql        = "SELECT * FROM `tokens` WHERE validity='valid' AND token_id='$tokenID' LIMIT 1" ;
				$result		= mysqli_query($con, $sql);
				$TokenCount = 0;
				if(!$result){
					echo mysqli_error($con);
				}
				else{
					while($rows=mysqli_fetch_array($result)){
						$TokenCount++;
						if($row=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `tokens` INNER JOIN `users` ON `tokens`.`user_id`=`users`.`id` WHERE validity='valid' AND token_id='$tokenID' LIMIT 1"), MYSQLI_ASSOC)){
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
						<h1>No Tokens Found!</h1>
						</center>
						<?php
					}
				}
				
				
			}




			if($_GET['data'] == 'ApproveToken'){
						//ajax.php?data=ApproveToken&token_id=15&prescription=Heheheheehhe
						//ajax.php?data=ApproveToken&token_id="+id+"&prescription="+PrescriptionText
		
						$tokenID    = mysqli_real_escape_string($con, $_GET['token_id']);
						$prescription    = mysqli_real_escape_string($con, $_GET['prescription']);
						$UpdateSQL       	= "UPDATE tokens SET validity='invalid', attendance='yes' WHERE token_id='$tokenID'";
						$result				= mysqli_query($con, $UpdateSQL);
						if(!$result){
							$data = array('posted' => 'falseasdasdasd');
							echo mysqli_error($con);
							echo json_encode($data);
						}else{
							$data = array('posted' => 'true');
							$UpdateSQL1       	= "INSERT INTO prescription VALUES(DEFAULT, '$tokenID', '$prescription')";
							$result				= mysqli_query($con, $UpdateSQL1);
							if(!$result){
								$data = array('posted' => 'false');
								echo json_encode($data);
								echo mysqli_error($con);
							}else{
								$data = array('posted' => 'true');
								echo json_encode($data);
							}	
							
						}	
			}


			if($_GET['data'] == 'DeclineToken'){
						//ajax.php?data=ApproveToken&token_id=15&prescription=Heheheheehhe
						//ajax.php?data=ApproveToken&token_id="+id+"&prescription="+PrescriptionText
		
						$tokenID    = mysqli_real_escape_string($con, $_GET['token_id']);
						$prescription    = mysqli_real_escape_string($con, $_GET['prescription']);
						$UpdateSQL       	= "UPDATE tokens SET validity='invalid', attendance='no' WHERE token_id='$tokenID'";
						$result				= mysqli_query($con, $UpdateSQL);
						if(!$result){
							$data = array('posted' => 'false');
							echo mysqli_error($con);
							echo json_encode($data);
						}else{
							$data = array('posted' => 'true');
							echo json_encode($data);
						}	
			}




			//Donate Blood Record
			if($_GET['data'] == 'DonateBloodRecord'){
				
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
						$Recordsql       	= "INSERT INTO `blood_donation_record` VALUES($userID, $time)";
						$result				= mysqli_query($con, $Recordsql);
						
						if(!$result){
							$data = array('posted' => 'false', 'message'=>'Error Occured!');
							echo json_encode($data);
						}
						else{
							$data = array('posted' => 'true', 'message'=>'Donated!');
							echo json_encode($data);
						}	
					}else{
							$data = array('posted' => 'false', 'message'=>'4 Months Not Passed!');
							echo json_encode($data);
					}
				}
				
				if($row == 0){
					$Recordsql       	= "INSERT INTO `blood_donation_record` VALUES($userID, $time)";
					$result				= mysqli_query($con, $Recordsql);
					
					if(!$result){
						$data = array('posted' => 'false', 'message'=>'Error Occured!');
						echo json_encode($data);
					}
					else{
						$data = array('posted' => 'true', 'message'=>'Donated!');
						echo json_encode($data);
					}	
				}
				
				
				//Ends Here
			}	
			


	
			
			
				
	}
		
}else{ echo "<script>window.open('../login.php','_self')</script>"; } ?>