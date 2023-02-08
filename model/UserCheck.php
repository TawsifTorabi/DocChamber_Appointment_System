<?php
		//Member Verification, Show Content if User is Member
		$CurrentUserId 		= mysqli_real_escape_string($con, $_COOKIE['userid']);
		$resultUserCheck	= mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$CurrentUserId'");
		$userTypeAdmin = '';
		
		if(!$resultUserCheck){
			echo mysqli_error($con);
		}else{
			if($rows=mysqli_fetch_array($resultUserCheck)){
				$userTypeAdmin = $rows['adminprivilege'];
			}
		}
		$memresult1 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `users` WHERE `id`='$CurrentUserId'"));
		
		
		if($userTypeAdmin == 'yes'){
			if($memresult1 == 1){
				$CurrentUserAdmin = 1;
			}else{
				$CurrentUserAdmin = 0;
			}
		}
		

		if($userTypeAdmin == 'no'){				
			if($memresult1 == 1){ 
				$CurrentUserAdmin = 0;
			}else{
				$CurrentUserAdmin = 0;
			}
		}

?>