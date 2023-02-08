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
		
		
		

	
	//get requests for data
	if(isset($_GET['data'])){
		
		
	


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
		
}else{ echo "<script>window.open('login.php','_self')</script>"; } ?>