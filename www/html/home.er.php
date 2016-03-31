<?php
	/**
	 * File: signIn.php now ER.php...jeff
	 *
	 * Created by PhpStorm.
	 * User: ArtofWack
	 * Date: 10/30/2015
	 * Time: 12:29 AM
	 */

	require_once("../config.php");
	require_once("../scrypt.php");


	session_start();
echo "signin start   ";


	$email = $_POST['email'];
	$pass = $_POST['Password'];
echo $email;
echo $pass;
//echo (isset($email);
	if (isset($email) && $email != "") {
		$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

		if ($link->connect_error)
			die(" Error: " . $link->connect_error);


		                          //$sql = 'SELECT * FROM users WHERE email="' . $email . '";'
                                                 //AND password ="' . '$pass' . '" LIMIT 1';

                                     //  $sql = "SELECT * FROM users WHERE email='$email' AND password='$' LIMIT 1";
$salted = (sha1($pass.PW_SALT));
//$sql= "select * from users where email= '".$email."' &&  password='".$salted."';";
$sql = 'SELECT * FROM users WHERE email="' . $email . '" AND password="'.$salted.'" AND created=0;';
	  echo $sql; 
//echo $password;

//$result=mysql_query($sql);
	         // or exit("Sql Error".mysql_error());
//	    $num_rows=mysql_num_rows($result);
                    $result = $link->query($sql);
//$result = $result->fetch_assoc();
//$dbPass = $result[2];


print_r($result);
//while ($row = mysql_fetch_row($result))
 //(foreach ($row as $key => $value)
 //  (echo "$key has this val.. $value<br />";)
//echo "<br />";
 //)

//$r = $result;

//$data = mysql_fetch_row($result);
//echo $data." pw ";
$timestamp = date('Y-m-d HH:mm:ss');
//echo now();
echo $result->num_rows."  ";
			
			$compare = (sha1($password.PW_SALT));
			
			if ($result->num_rows > 0) {
				//$check_PW = sha1($pass.PW_SALT)
				$sql = 'SELECT * FROM users WHERE email="' . $email . '" AND created=0;';
				$result = $link->query($sql)->fetch_assoc();
                   $sql = 'UPDATE users SET created= now() WHERE email="' . $email . '";';
echo $sql;
$result = $link->query($sql);
//UPDATE child_codes SET counter_field = counter_field + 1;
                              // $result = $link->query($sql);
	
echo $salted." salted ";
echo $compare." compare ";				 
$cmp = `password`;
		$result = $link->query($sql);     
echo $cmp."...."; 

echo $sql;

				 //$_SESSION['username'] = $result['fullName'];
				 $_SESSION['email'] = $email;
echo $email;
				// $_SESSION['guestID'] = $result['guestID'];
				// header('Location: hotel.php'); 
echo "VERIFIED>>>>VERIFIED>>>>>>VERIFIED";
//echo $passwd;
//echo (sha1($pass.PW_SALT));			}  else {
				//$result->close();
				//$link->close();
				session_unset();}
			

}

		
		
	 


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Response STAT</title>

	<!-- Bootstrap core CSS -->
	<link href="bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Cosmo Theme CSS
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet"
	        integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w=="
	        crossorigin="anonymous">
	-->

	<!-- Custom styles for this template -->
	<!-- link href="hotel.css" rel="stylesheet">
</head>

<!-- ================ Banner ================ -->
<div class="container under-nav">
	<img src="statBanner.jpg"alt="banner" height="50" width="1155">

<body>

<body>
<!-- ========== Log out modal ========== -->
<div class="modal fade" id="outModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Logout</h4>
			</div>
			<div class="modal-body">
				<!-- ================ Form ================ -->

				<form class="form-horizontal" method="post" action="logout.php" id="logoutForm">
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email"
							       required>
						</div>
					
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5">
							<button type="submit" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- ========== Register modal ========== -->
<div class="modal fade" id="registerModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Register</h4>
			</div>
			<div class="modal-body well">
				<!-- ================ Form ================ -->

				<form class="form-horizontal" method="post" action="registerIndex.php">
					<div class="form-group">
						<label for="firstName" class="col-sm-4 control-label">First Name</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="firstName" id="firstName"
							       placeholder="First Name"
							       required autofocus>
						</div>
					</div>
					<div class="form-group">
						<label for="lastName" class="col-sm-4 control-label">Last Name</label>

						<div class="col-sm-6">
							<input type="text" class="form-control" name="lastName" id="lastName"
							       placeholder="Last Name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" placeholder="email" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-4 control-label">Password</label>

						<div class="col-sm-6">
							<input type="password" class="form-control" name="Password" placeholder="Password"
							       required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5 col-sm-3">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>



<!-- ================ NAV Bar ================ -->
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top" id="nav">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					        aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="#">Response STAT</a>  -->
                                <a class="navbar-brand" href="#"><h4>~~~~~~~~~~~Response  . . STAT</h4</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
		       
						<!-- <li><a href="#about">A....</a></li> -->
						<!--<li><a href="#contact">Cont..</a></li> --> 
					<li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
						 <!-- <li class="dropdown active"> -->
						<!--	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" -->
						<!--	   aria-haspopup="true" aria-expanded="false">Res.....<span class="caret"></span></a> -->
						<!--	<ul class="dropdown-menu"> --> 
						<!--		<li class="dropdown-header">New Reservations</li> -->
						<!--		<li><a href="reserve.php">New Reservation</a></li> -->
						<!--		<li><a href="index.php">Check Availability</a></li> -->
						<!--		<li><a href="#">Dining Reservations</a></li> -->
						<!--		<li role="separator" class="divider"></li> -->
						<!--		<li class="dropdown-header">Existing Reservations</li> -->
						<!--		<li><a href="#">Check Reservation</a></li> -->
						<!--		<li><a href="#">Cancel Reservation</a></li> -->
						<!--	</ul> -->
						<!-- </li>  -->
					<li>
                                            <a href="#" id="login" data-toggle="modal"
                                                    data-target="#myModal"><?php echo isset($_SESSION['email']) ? ", " . $_SESSION['email'] : "Sign In" ?></a>
					</li>         
					<li>
                                            <a href="#" id="logout" data-toggle="modal"
                                                    data-target="#outModal"><?php echo isset($_SESSION['email']) ? ", " . $_SESSION['email'] : "Logoff" ?></a>
					<li><a href="home.er.php">Home</a></li> 
					</ul>
				</div>
			</div>
		</nav>
	</div>

<!-- ================ Main img ================ -->
<div class="container under-nav">
	<a href="ER.php" id="login" data-toggle="modal" data-target="#myModal"><img src="jeffstat.jpg"alt="Chopper" height="680" width="1140">
 <?php echo isset($_SESSION['email']) ? ", " . $_SESSION['email'] : "Sign In" ?></a>

 
		
</div>
<!-- ========== Log in modal ========== -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Log in</h4>
			</div>
			<div class="modal-body">
				<!-- ================ Form ================ -->

				<form class="form-horizontal" method="post" action="ER.php" id="loginForm">
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email</label>

						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email"
							       required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-4 control-label">Password</label>

						<div class="col-sm-6">
							<input type="password" class="form-control" name="Password" id="Password" placeholder="Password"
							       required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-5">
							<button type="submit" class="btn btn-primary">Sign in</button>
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

</body>
</html>