<!DOCTYPE html>

<?php

	/**
	 *       registerIndex.php
         *
         *       Jeff Goldberg WSMS 1/2016
	 *
                  Register new user 
	 */

	require_once("../config.php");//database config
        require_once("rs.html");//Homepage format
                  

	session_start();
                                                                                                                                                            
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $pw = ($_POST['Password']);
/**
		 * Create a password hash
		 *
		 * @param string $password The clear text password
		 * @param string $salt     The salt to use, or null to generate a random one
		 * @param int    $N        The CPU difficultly (must be a power of 2, > 1)
		 * @param int    $r        The memory difficultly
		 * @param int    $p        The parallel difficultly
		 *
		 * @return string The hashed password

		 */
       
                                                                                                                                           
        $encrypted = sha1($pw.PW_SALT);
                                                                                                                                            
	
                                                                                                                             	

	$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	if ($link->connect_error)
		die(" Error: " . $link->connect_error);
                   
                  // is user already registered in db?
	$sql = "SELECT * FROM users WHERE email='" . $email . "'; ";
                                                                                                                                            

                //register user after verifying all fields entered and not already in db
  
	if ($link->query($sql)->num_rows == 0 && $email != '' && $firstName != '' && $lastName != '' && $encrypted != '' ) {
		$sql = "INSERT INTO users( username,  password, email )
		VALUES ( '" .$firstName. "' ,'" . $encrypted . "','" . $email . "' );";
		$link->query($sql);
                 echo("<h1>Registered</h1>");                 
                 echo '<script>'; echo 'alert("Registration Successful")'; echo '</script>';                       

	}else{
		echo '<label class="text-danger"></label>';
		echo '<script>'; echo 'alert("Registration Incorrect")'; echo '</script>'; // Not safe: should not indicate if email exists in DB
                                    $link->close();
             }
?>
 
</html>

