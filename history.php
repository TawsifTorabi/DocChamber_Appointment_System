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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/client.css"/>
	<link rel="stylesheet" type="text/css" href="css/aurna-lightbox.css"/>
	<title>Your History</title>
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
					<h1 style="margin-left: 23px;">Your History</h1>
				</div>
				<table border="0" id="dataTable1" style="padding: 20px;">
				<?php
					mysqli_set_charset($con,"utf8");
					$id    		= mysqli_real_escape_string($con, $_COOKIE['userid']);
					$sql        = "SELECT * FROM `tokens` INNER JOIN `prescription` ON `tokens`.`token_id` = `prescription`.`token_id` WHERE `tokens`.`user_id`=$id AND `tokens`.`validity`='invalid'" ;
					$result		= mysqli_query($con, $sql);
					$TokenCount = 0;
					if(!$result){
						echo mysqli_error($con);
					}
					else{
						while($rows=mysqli_fetch_array($result)){
							$TokenCount++;
							
					?>		
								<tr class="hoverROw">
									<td id="col1">
									<?php
										$date = $rows['date'];

									?>
										</br>
										<span class="appointmentTitle">Token ID <i>#<?php echo $rows['token_id'];?></i></span>
										</br>
										</br>
										<b>Date: </b> <?php echo date("F j, Y", strtotime($date));?>, <?php echo date("D", strtotime($date))?></br>
										<b>Transaction ID: </b> <?php echo $rows['transaction_id'];?></br>
										<h3>Details: </h3>
										<p><?php echo $rows['problem']?></p>
										<hr>
										<h3>Prescription: </h3>
										<p><?php echo $rows['prescription']?></p>
									</td>
									<td id="col2"> </td>
								</tr>
					<?php
							
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