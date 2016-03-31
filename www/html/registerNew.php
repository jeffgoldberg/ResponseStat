<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --> 
    <meta name="description" content=""> 
    <meta name="author" content="Duane"> 
 
    <title>Signin Template for Bootstrap</title> 
 
    <!-- Bootstrap core CSS --> 
    <link href="./bootstrap.min.css" rel="stylesheet"> 
    <script src="./jquery-2.1.4.min.js"></script> 
 
    <!-- Custom styles for this template --> 
    <link href="signin.css" rel="stylesheet"> 
  </head> 
 
  <body>
<div class="container">
<form class="form-signin" action="save_registration.php" method="post">
<h2 class="form-signin-heading">Please Register</h2>
<input name="username" id="username" value="" class="form-control" placeholder="Username" type="text"><br />
<input name="email" id="email" value="" class="form-control" placeholder="Email" type="text"><br />
<input name="pass1" value="" class="form-control" placeholder="Password" type="password"><br />
<input name="pass2" value="" class="form-control" placeholder="Retype Password" type="password"><br />
<input type="submit" class="btn btn-lg btn-primary btn-block" value="Submit">
</form>
</div>
</html>