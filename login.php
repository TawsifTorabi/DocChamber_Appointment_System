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
	
	//verify session id
	if(mysqli_num_rows(mysqli_query($con, "select * from sessions where session_id='$getsessionID' AND validity='$validity' ORDER BY `id` DESC LIMIT 1"))> 0){
	
		echo "<script>window.open('dashboard.php','_self')</script>";
	
	} else {
			
				//get login form data
				
				if(isset($_POST['login'])){
					//get user name and password
					$user_name = mysqli_real_escape_string($con, $_POST["user_name"]);
					$user_pass = mysqli_real_escape_string($con, $_POST["pass"]);
					
					//match the username and password from database
					if(mysqli_num_rows(mysqli_query($con, "select * from users where username='$user_name' AND password='$user_pass'"))> 0){

						//get user ID and Privilage
						$new_query="select * from users where username='$user_name' AND password='$user_pass'";				
						if($rows=mysqli_fetch_array(mysqli_query($con, $new_query), MYSQLI_ASSOC)){  
							$userid = $rows['id'];
							$privilege = $rows['adminprivilege'];
						}
						
						//create unique session id
						$ipaddress = $_SERVER['REMOTE_ADDR'];
						$sessionID = time();
						//$sessionID = hash('sha256', $user_name + $_SERVER['REMOTE_ADDR'] + time());
						$issuetime = time();
						$expirytime = "0";
						$validity = "valid";
						$browser = $_SERVER['HTTP_USER_AGENT'];
						$user_ip = getenv('REMOTE_ADDR');
						$geo = "";
						$country = "Bangladesh";
						$city = "Dhaka";
						$location = "";		  
						//save session id, IP Address, Login Information to Database
						 mysqli_query($con, "
						 Insert Into `sessions` (`session_id`, `user_id`, `issued`, `expiry_time`, `ipaddress`,`browser` ,`location`, `validity`) Values
						  (
							'$sessionID',
							'$userid',
							'$issuetime',
							'$expirytime',
							'$ipaddress',
							'$browser',
							'$location',
							'$validity'
						  )
						  ");	  

							$_SESSION['librarypanel'] = $sessionID;
							$_SESSION['username'] = $user_name;
							$_SESSION['userid']= $userid;
							$_SESSION['privilege']= $privilege;
							
							setcookie("sessionid", $sessionID, time() + 31536000, '/');
							setcookie("username", $user_name, time() + 31536000, '/');
							setcookie("userid", $userid, time() + 31536000, '/');
							setcookie("privilege", $privilege, time() + 31536000, '/');
							
							echo "<script>window.open('dashboard.php','_self')</script>";
							//echo mysql_error();
							
					} else {
						$message = "User Name or Password is Incorrect";
						//echo "<script>alert('User Name or Password is Incorrect')</script>";
						//echo mysql_error();
					}
				}
		
			?>
			
			<html>
			<head>
				<title>Login - <?php echo $GlobalAppName;?></title>
				<style type="text/css" >

				@font-face {
					font-family: nlight;
					src: url(css/NexaLight.otf);
				}
				@font-face {
					font-family: nbold;
					src: url(css/NexaBold.otf);
				}

				body, html {
					height: 100%;
					margin: 0;
					font-family: nlight;
					background: linear-gradient(#f70cbc, #73009d);
					color: white;
				}

				html{
					margin: 0px;
					background-image: url("../images/cover2.jpg");
					height: 100%;
					background-position: center;
					background-attachment: fixed;
					background-repeat: no-repeat;
					background-size: cover;
				}
				.clearfix{
					height: 40px;
				}
				.bloglinks {
				  color: white;
				  text-decoration: none;
				  font-style: italic;
				  background-color: #ce0adf2e;
				  padding: 5px;
				  line-height: 14px;
				  font-size: 12px;
				  border-radius: 2px;
				  text-shadow: 1px 1px 2px #00000078;
				  width: 100%;
				  display: inline-block;
				  margin-bottom: 2px;
				  box-shadow: 0px 0px 10px #00000054;
				  transition: 0.3s;
				  animation: ease-in;
				}
				.bloglinks:hover {
				  background-color: #d60fe87d;
				  padding: 5px;
				  line-height: 14px;
				  font-size: 13px;
				  border-radius: 2px;
				  text-shadow: 1px 1px 2px #00000078;
				  display: inline-block;
				  margin-bottom: 2px;
				  transition: 0.3s;
				  animation: ease-in;
				}

				.bgimage{
					margin: 0px;
					background-image: url("../images/cover2.jpg");
					height: 100%; 
					background-position: center;
					background-attachment: fixed;
					background-repeat: no-repeat;
					background-size: cover;
				}

				.bgtext {
					float: left;
				}



				.logoicontop{
				  border-radius: 50%;
				  border: 3px solid white;
				  height: 62px;
				  padding: 2px;
				  position: fixed;
				  z-index: 9999;
				  overflow: visible;
				  background: linear-gradient(to left top, #34039d, #d75a9c);
				  margin-top: 11px;
				  margin-left: 20px;
				}

				.headnamecontainer {
				  display: table-cell;
				  font-family: nexa light;
				  font-synthesis: style;
				  background-color: rgba(0,0,0, 0.4);
				  color: white;
				  font-weight: bold;
				  width: 42%;
				  padding: 21px;
				  margin-top: 8%;
				  vertical-align: text-bottom;
				  height: 342px;
				  padding-left: unset;
				}

				.headnamecontainer_1 {
				  display: table-cell;
				  font-family: nexa light;
				  font-synthesis: style;
				  background-color: rgba(184, 6, 234, 0.65);
				  color: white;
				  font-weight: bold;
				  width: 42%;
				  padding: 21px;
				  padding-left: 21px;
				  margin-top: 8%;
				  vertical-align: text-bottom;
				  height: 342px;
				  padding-left: unset;
				}

				.skillcontainer {
				  display: table-cell;
				  font-family: nexa light;
				  font-synthesis: style;
				  background-color: rgba(0,0,0, 0.4);
				  color: white;
				  font-weight: bold;
				  width: 42%;
				  padding: 21px;
				  margin-top: 8%;
				  vertical-align: text-bottom;
				  height: 342px;
				  padding-left: unset;
				}


				.namehead {
					letter-spacing: 3px;
					font-family: nlight;
					font-size: 60px;
				}
				.thishead {
					letter-spacing: 3px;
					font-family: nlight;
					font-size: 20px;
				}
				.parentdetail{
					letter-spacing: 1px;
					font-family: nlight;
					font-size: 14px;		
					word-wrap: break-word;
				}


				.profilephoto{
					border-radius: 50%;
					border: 8px solid #fff;
					/* width: 25%; */
					height: 237px;
					box-shadow: 0 7px 8px -4px #662d8c,0 10px 30px 4px rgba(207,0,255,.5),0 4px 5px -1px #2b0950,0 0 1px 0 rgba(207,0,255,.5),inset 0 0 0 1px rgba(255,255,255,.24);
					transition: 0.7s;
				}
				.profilephoto:hover {
					border: 8px solid #d98eff;
					transition: 0.7s;
					box-shadow: 0 10px 10px -4px #662d8c,0 15px 30px 4px rgba(207,0,255,.5),0 7px 7px -1px #2b0950,0 1px 1px 0 rgba(207,0,255,.5),inset 0 0 8px 0 #ff005b;
				}

				@media screen and (max-width: 600px) {
					.profilephoto{
						margin-bottom: 21px;
					}
				}






				@keyframes glitch {
				  0% {
					text-shadow: -2px 3px 0 red, 2px -3px 0 blue;
					transform: translate(var(--glitch-translate));
				  }
				  2% {
					text-shadow: 2px -3px 0 red, -2px 3px 0 blue;
				  }
				  4%, 100% {  text-shadow: none; transform: none; }
				}

				/* Top navigation */

				.topnav {
				  overflow: hidden;
				  background-color: #333;
				  z-index: 5;
				  width: 100%;
				}

				.topnav a {
				  float: left;
				  display: block;
				  color: #f2f2f2;
				  text-align: center;
				  padding: 14px 16px;
				  text-decoration: none;
				  font-size: 17px;
				  font-family: nbold;
				  text-shadow: 1px 2px 0px rgba(0, 255, 231, 0.57);
				  background-color: #510044;
				}

				.active {
				  background: linear-gradient(#f70cbc, #73009d);
				  color: white;
				}

				.topnav .icon {
				  display: none;
				}

				.dropdown {
				  float: left;
				  overflow: hidden;
				}

				.dropdown .dropbtn {
				  font-size: 17px;    
				  border: none;
				  outline: none;
				  color: white;
				  padding: 14px 16px;
				  background-color: inherit;
				  font-family: nbold;
				  margin: 0;

				}

				.dropdown-content {
				  display: none;
				  position: absolute;
				  background-color: #f9f9f9;
				  min-width: 160px;
				  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				  z-index: 1;
				}

				.dropdown-content a {
				  float: none;
				  color: white;
				  padding: 12px 16px;
				  text-decoration: none;
				  display: block;
				  text-align: left;
				  background-color: #581cb0;
				}

				.topnav a:hover, .dropdown:hover .dropbtn {
				  background-color: #555;
				  color: white;
				  animation-duration: 1s;
				  animation-iteration-count: 5;
				  transform-origin: bottom;
				  animation-name: glitch;
				  background-image: linear-gradient(#f700ff,#7e2dc1,#0d8c93);
				}

				.dropdown-content a:hover {
				  background-color: #ddd;
				  color: white;
				  background-image: linear-gradient(#071033, #ca0084);
				}

				.dropdown:hover .dropdown-content {
				  display: block;
				}

				@media screen and (max-width: 600px) {
				  .topnav a:not(:first-child), .dropdown .dropbtn {
					display: none;
				  }
				  .topnav a.icon {
					display: block;
				  }
				}

				@media screen and (max-width: 600px) {
				  .topnav.responsive {position: relative;}
				  .topnav.responsive .icon {
					position: absolute;
					right: 0;
					top: 0;
				  }
				  .topnav.responsive a {
					float: none;
					display: block;
					text-align: left;
				  }
				  .topnav.responsive .dropdown {float: none;}
				  .topnav.responsive .dropdown-content {position: relative;}
				  .topnav.responsive .dropdown .dropbtn {
					display: block;
					width: 100%;
					text-align: left;
				  }
				}
				.inputBox{
				  padding: 11px;
				  width: 250px;
				  font-size: 18px;
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
				
				.container {
					background-color: #0000007a;
					/* text-align: center; */
					width: 359px;
					padding: 30px;
					border-radius: 11px;
					box-shadow: 0px 0px 21px 18px #ffffff21;
				}
				a{
					color: white;
				}

			</style>
			</head>
			<body>
				<div style="height: 15%;"></div>
				<center>
				<div class="container">
				</br>
				<a style="text-decoration: none;" href="index.php"><h1><?php echo $GlobalAppName;?></h1></a>
				<h2>Login</h2>
				</br>
				<span><?php echo $message; ?></br></br></span>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<input class="inputBox" type="text" placeholder="Username" name="user_name">
					</br>
					<input class="inputBox" type="password" placeholder="Password" name="pass">
					</br>
					<input class="button-15" type="submit" value="Login" name="login">
				</form>
				<a href="accountrecovery.php">Forgot Password?</a> | <a href="signup.php">Create Account</a>
					</br>
				</div>
				</center>	
			</body>
			</html>
	<?php } ?>