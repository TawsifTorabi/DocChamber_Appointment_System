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
	$userid	= $_COOKIE['userid'];
	
	//verify session id
	if(mysqli_num_rows(mysqli_query($con, "select * from sessions where session_id='$getsessionID' AND validity='$validity' ORDER BY `id` DESC LIMIT 1"))> 0){
		
	if(mysqli_num_rows(mysqli_query($con, "select * from tokens where user_id='$userid' AND validity='$validity' ORDER BY `token_id` DESC LIMIT 1")) > 0){
		
		echo "<script>window.open('messages/token-exists.php','_self')</script>";
		
	}else{
		//get token form data
				
				if(isset($_POST['tokenCreate'])){
					
					//Get User Details
					if ($conn->query("SELECT name FROM users WHERE id='$userid'")->num_rows > 0) {
						// output data of each row
						if($row = $conn->query("SELECT * FROM users WHERE id='$userid'")->fetch_assoc()) {

							//$echo $row['name'];
							
						}
					} else {
							//echo "<b style='color:red;'>Authentication Error!</b>";
					}

					//get current time
					$issuetime = time();
					$currentDay = date("D");
					$today = date("Y-n-j"); 
					$problem = mysqli_real_escape_string($con, $_POST["problem"]);  
					  
					//Get Last Transaction Details
					if ($conn->query("SELECT * FROM transaction WHERE user_id='$userid' ORDER BY id DESC LIMIT 1")->num_rows > 0) {
						// output data of each row
						if($row = $conn->query("SELECT * FROM transaction WHERE user_id='$userid' ORDER BY id DESC LIMIT 1")->fetch_assoc()) {
							$transactionID = $row['id'];
							if(mysqli_num_rows(mysqli_query($con, "select * from tokens where transaction_id='$transactionID'")) >= 3){
								$Trans_ID = 'null';
							}else{
								$Trans_ID = $transactionID;
							}
							
						}
					}else{
						$Trans_ID = 'null';
					}
					
					 
					//Save Information to Database
					mysqli_query($con, "
					 Insert Into `tokens` (`user_id`, `week_day`, `date`, `problem`, `transaction_id`, `validity`, `createDateTime`) Values
					  (
						'$userid',
						'$currentDay',
						'$today',
						'$problem',
						'$Trans_ID',
						'valid',
						'$issuetime'
					  )
					  ");	
					 if($Trans_ID == 'null'){
						echo "<script>window.open('transaction.php','_self')</script>";
					 }else{
						echo "<script>//parent.hideIframe(); 
						parent.location.reload();</script>"; 
					 }
				}
		
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Create Token</title>
				<style>
				.inputBox{
				  padding: 7px;
				  width: 250px;
				  font-size: 14px;
				  color: gray;
				  border-radius: 7px;
				  border: 1px solid gray;
				  background: white;
				  margin-bottom: 7px;
				}


				/* CSS */
				.button-15 {
				  background-image: linear-gradient(#42A1EC, #0070C9);
				  border: 1px solid #0077CC;
				  border-radius: 8px;
				  box-sizing: border-box;
				  color: #FFFFFF;
				  cursor: pointer;
				  direction: ltr;
				  display: block;
				  font-family: "SF Pro Text","SF Pro Icons","AOS Icons","Helvetica Neue",Helvetica,Arial,sans-serif;
				  font-size: 19px;
				  font-weight: 400;
				  letter-spacing: 0.08em;
				  line-height: 1.47059;
				  min-width: 30px;
				  overflow: visible;
				  padding: 4px 15px;
				  text-align: center;
				  vertical-align: baseline;
				  user-select: none;
				  -webkit-user-select: none;
				  touch-action: manipulation;
				  white-space: nowrap;
				  width: 250px;
				}

				.button-15:disabled {
				  cursor: default;
				  opacity: .3;
				}

				.button-15:hover {
				  background-image: linear-gradient(#51A9EE, #147BCD);
				  border-color: #1482D0;
				  text-decoration: none;
				}

				.button-15:active {
				  background-image: linear-gradient(#3D94D9, #0067B9);
				  border-color: #006DBC;
				  outline: none;
				}

				.button-15:focus {
				  box-shadow: rgba(131, 192, 253, 0.5) 0 0 0 3px;
				  outline: none;
				}

				a{
					color: white;
				}
				</style>
			</head>
			<body>
				<div style="height: 8%;"></div>
				<div class="container">
				<a style="text-decoration: none; font-family:Trebuchet MS;" href="javascript:void(0)"><h2>Create New Token</h2></a>
				<span id="message" style="color: white;"><?php echo $message; ?></span>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="color: white;">
					<label for="dob" style="color: white;">Type in Problem Details:</label></br></br>
					<textarea placeholder="Problem..." id="problem" name="problem" style="padding: 20px; width: 94%; height: 260px; font-family: Trebuchet MS; font-size: 16px;"></textarea>
					</br>
					<input class="button-15" id="submitBtn" type="submit" value="Create Token" name="tokenCreate">
				</form>
				</div>
				</br>
				</br>
			</body>
			</html>
			
<?php
	
		}
	} else {
			
?>
	<script>//parent.hideIframe();</script>
		
	<?php } ?>