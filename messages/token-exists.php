<?php
	session_start();
	
	//create database connection
	include("../connect_db.php");
	
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
	$userID 	= $_COOKIE['userid'];
	
	//verify session id
	if(mysqli_num_rows(mysqli_query($con, "select * from sessions where session_id='$getsessionID' AND validity='$validity' ORDER BY `id` DESC LIMIT 1"))> 0){
	?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Token Exists</title>
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
				<center>
				<h2 style="color: white;  text-decoration: none; font-family:Trebuchet MS;" >Unused Token Exists</h2>
				</center>
				</div>
				</br>
				</br>
			</body>
			</html>
			
<?php
	
		
	} else {
			
?>
	<script>parent.hideIframe();</script>
		
	<?php } ?>