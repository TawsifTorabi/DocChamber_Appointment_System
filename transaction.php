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
		
	if(mysqli_num_rows(mysqli_query($con, "select * from tokens where user_id='$userid' AND validity='$validity' AND transaction_id='null' ORDER BY `token_id` DESC LIMIT 1")) > 0){


				//get transaction request
				
				if(isset($_POST['transaction'])){
					
					//Set Variables
					$issuetime = time();
					$str = $issuetime.$userid;
					$transaction_id = md5($str);
					$amount = '50';
					
					//Save Information to Database
					mysqli_query($con, "
					 Insert Into `transaction` (`transaction_id`,`user_id`, `amount`, `timestamp`) Values
					  (
						'$transaction_id',
						'$userid',
						'$amount',
						'$issuetime'
					  )
					  ");	  
					  
					//Get Last Transaction Details
					if ($conn->query("SELECT * FROM transaction WHERE user_id='$userid' ORDER BY id DESC LIMIT 1")->num_rows > 0) {
						// output data of each row
						if($row = $conn->query("SELECT * FROM transaction WHERE user_id='$userid' ORDER BY id DESC LIMIT 1")->fetch_assoc()) {
							$transactionID = $row['transaction_id'];							
						}
					}
					

					//Set Last Token Details
					if ($conn->query("select * from tokens where user_id='$userid' AND validity='$validity' AND transaction_id='null' ORDER BY `token_id` DESC LIMIT 1")->num_rows > 0) {
						// output data of each row
						if($row = $conn->query("select * from tokens where user_id='$userid' AND validity='$validity' AND transaction_id='null' ORDER BY `token_id` DESC LIMIT 1")->fetch_assoc()) {
							
							$updateToken       	= "UPDATE `tokens` SET transaction_id='$transactionID' WHERE user_id='$userid' AND validity='$validity' ORDER BY `token_id` DESC LIMIT 1";
							$result				= mysqli_query($con, $updateToken);
							if(!$result){
								echo "<h1>Error!</h1>";
							}else{
								echo "<script>parent.location.reload();</script>
								<script>parent.hideIframe();</script>
								";
								
							}
							
						}
					} 
					
				}
		
			?>
			
			<!DOCTYPE html>
			<html>
			<head>
				<title>Payment</title>
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
				<a style="text-decoration: none; font-family:Trebuchet MS;" href="javascript:void(0)"><h2>Create A Payment</h2></a>
				<a style="text-decoration: none; font-family:Trebuchet MS;" href="javascript:void(0)"><h4>It's a Dummy Payment System</h4></a>
				<span id="message" style="color: white;"><?php echo $message; ?></span>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="color: white;">
					<label for="amountTaka" style="color: white;">Payment Amount:</label></br></br>
					<input class="inputBox" type="number" disabled value="50" placeholder="Payment Amount" id="amount" name="amountTaka"> Taka
					</br>
					<input class="button-15" id="submitBtn" type="submit" value="Confirm Payment" name="transaction">
				</form>
				</div>
				</br>
				</br>
			</body>
			</html>
					
<?php
	}else{
		echo "<script>window.open('messages/token-exists.php','_self');;</script>";

		}
	} else {
			
?>
	<script>parent.hideIframe();</script>
		
	<?php } ?>