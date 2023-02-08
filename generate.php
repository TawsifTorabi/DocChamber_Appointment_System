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
	if(mysqli_num_rows(mysqli_query($con, "select * from sessions where session_id='$getsessionID' AND validity='$validity'"))>0){

	
	
	/*
	
	A Script to generate automated time schedule for doctor appointments.
	
	*/
	
		date_default_timezone_set('Asia/Karachi');
		mysqli_set_charset($con,"utf8");
		$id = mysqli_real_escape_string($con, $_COOKIE['userid']);
		
		
		//24HRS CLOCK
		$startDayTime = "08:30";
		$endDayTime = "16:30";
		
		$startDayTimeArr = explode(":",$startDayTime);
		$startDayTimeHour = $startDayTimeArr[0];
		$startDayTimeMin = $startDayTimeArr[1];
		
		$endDayTimeArr = explode(":",$endDayTime);
		$endDayTimeHour = $endDayTimeArr[0];
		$endDayTimeMin = $endDayTimeArr[1];
		
		//Dates to Skip
		$DayToSkip = array("Thu", "Fri");
		
		
		//Take Count of last token
		$sql        = "SELECT * FROM `tokens` ORDER BY `id` DESC LIMIT 1";
		$TokenCount = mysqli_num_rows(mysqli_query($con, $sql));
		
		//If No Token Registered, Write the First Token.
		if($TokenCount == 0){
			
			echo "Current Time: ";
			echo date("F j, Y, g:i a").'</br>';
			
			
			//Get Current Hour
			$currentHour = date("H");
			$currentMiniute = date("i");
			
			//Debuging variables
			echo "-----" . '</br>';
			echo "Current Hour -- ".((int)$currentHour) . '</br>';
			echo "Next Hour ----- ".((int)$currentHour+1) . '</br>';
			echo "Closing Hour -- <b>".$endDayTimeHour . '</b></br>';
			echo "-----" . '</br>';
		
			/*
				$DateGen
				0 = Today
				1 = Tomorrow
				2 = The day after tomorrow
				//Day When to generate token
				
				$TimeLeft
				true = Time left for today.
				false = no time left for today.
				//Time left for today tokens
				
				$NextDayBool
				true = force token to next day
				false = force token to current day
			
			*/
		
			$TimeLeft = false;
			$DateGen = null;
			$NextDayBool = false;
			
			
			if((((int)$currentHour)) <= 16 && (((int)$currentHour)) >= 8){
				//If current hour is in range

				if((((int)$currentHour)) == 16 ){
					//If current hour is closing hour
					
					if(((int)$endDayTimeMin)-(((int)$currentMiniute)) > 19){
						//If 15 Min Still Left + 5 min compensation
						echo '20 Min Left Until Closing.'.'</br>';
						$TimeLeft = true;
					}else{
						echo 'Time just Ended. No Time Left. Going for Next Day'.'</br>';
						$TimeLeft = false;
						$NextDayBool = true;
					}
				}else if((((int)$currentHour)) == 8){
					//Day Start
					//If current hour is closing hour
					if(((int)$startDayTimeMin)-(((int)$currentMiniute)) > 29 && ((int)$startDayTimeMin)-(((int)$currentMiniute)) < 0){
						//Day Start, Execute Query.
						echo 'Day Started, Time Left'.'</br>';
						$TimeLeft = true;
					}
				}else{
					//The hour is inside range.
					echo 'A lot of Time Left'.'</br>';
					$TimeLeft = true;
				}
			}else{
				if((((int)$currentHour)) < 8){
					//Current Hour gone out of range of 8 to 16
					echo 'Day haven\'t started yet.'.'</br>';
					$NextDayBool = false;
				}
			}
			
			
			//Get Date Variables
			$currentDay = date("D");
			$nextDay = date('D', strtotime(' +1 day'));
			$ThenNextDay = date('D', strtotime(' +2 day'));
			
			if(in_array($currentDay, $DayToSkip)){
			//Check if today is to skip, check for next day
			
				if(in_array($nextDay, $DayToSkip)){
				//Check if next day is to skip
				//Execute Script, generate for the Then next day
					$DateGen = 2;
					echo 'Generate For The Day After Tomorrow - '.$ThenNextDay.'</br>';
				}else{
					//Execute Script, generate for next day
					$DateGen = 1;
					echo 'Generate For Tomorrow - '.$nextDay.'</br>';
				}
			
			}else{
				//Execute Script, generate for today
				$DateGen = 0;
				echo 'Generate For Today - '.$currentDay.'</br>';
			}

		
		
			//Debuging Values
			echo "-----" . '</br>';
			echo '$DateGen = ';
			echo $DateGen . '</br>';
			//Day When to generate token
			
			echo "-----" . '</br>';
			echo '$TimeLeft = '; 
			echo var_export($TimeLeft) . '</br>';
			//Time left for today tokens
			
			echo "-----" . '</br>';
			echo '$NextDayBool = ';
			echo  var_export($NextDayBool) . '</br>';
			//Forces token to next day or today
		
		


			
			$CurrentTime = time();
			echo "-----" . '</br>';
			echo 'Current Day - '.$currentDay.'</br>';
		}
		
		
		
		
	} else { echo "<script>window.open('login.php','_self')</script>"; } ?>