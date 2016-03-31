
<!DOCTYPE html>

<?php

	/**
	 * File: rs.php 
	 * Jeff Goldberg WSMS
	 *
	 * 1/2016
	 */



	require_once("../config.php");
	
        require_once("rs.html");

              
	session_start();
      										                                           
                                                                                    echo "jeff:".$_SESSION['email'];
                                                                                    echo "signin start   ";


	$email = $_POST['email'];
	$pass = $_POST['Password'];
                  $_SESSION['email']  = $email;

                                                                                    echo $email;
                                                                                    echo $pass;
                                                                                    
	                                                                                                                                                                                                                                      
                                    
        if (isset($email) && $email != "") {
	$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		if ($link->connect_error) {
                    
                    	die(" Error: " . $link->connect_error);
                                                            }


                                                                                                  	
        //encrypted password for compare to db
        $salted = (sha1($pass.PW_SALT));
                                                                                             
              

        // is user in db and not already logged in?
        $sql = 'SELECT * FROM users WHERE email="' . $email . '" AND password="'.$salted.'" AND created=0;';
                                                                                                                                                                                                 													echo $sql; 


		
	         
         $result = $link->query($sql);



							


                                                                                                                                                    												print_r($result);
                        				





           $timestamp = date('Y-m-d HH:mm:ss');

                                                                                                                                                											echo $result->num_rows."  ";
			
           $compare = (sha1($password.PW_SALT));





	
            //find user and verify not already signed in

            if ($result->num_rows > 0) {
                                                                                                                                                //						     				$check_PW = sha1($pass.PW_SALT)
                        $sql = 'SELECT * FROM users WHERE email="' . $email . '" AND created=0;';
                        $result = $link->query($sql)->fetch_assoc();
//echo 'res...'.$result->$row[created];
                        // flag user as signed in
                        $sql = 'UPDATE users SET created= now() WHERE email="' . $email . '";';
                                                                                                                                                    												echo $sql;
                        $result = $link->query($sql);



	
                                                                                                                                                    												echo $salted." salted ";
                                                                                                                                                    											echo $compare." compare ";				 
                         $cmp = `password`;
                                               					 //$result = $link->query($sql);     
                                                                                                                                                    											echo $cmp."...."; 

                                                                                                                                                    												echo $sql;

                                                  				   //$_SESSION['username'] = $result['fullName'];

                        $_SESSION['email'] = $email;
                                                                                                 echo "jeff:".$_SESSION['email'];
                                                                                                                                                											echo $email;
                                                                                 // $_SESSION['guestID'] = $result['guestID'];
                                                                                  // header('Location: hotel.php'); 
                                        
                        $_POST['email'] = $email; 
                                                                                                                                echo " post.. "; 
                         echo "<script type='text/javascript'>window.top.location='http://localhost/medical/testdrag4.php';</script>"; exit;


                       			}  else {



                        $_POST['email'] = $email;
                        $_SESSION['email'] = $email;
			




//header("Location: http://localhost/medical/testdrag4.php");
//echo 'res...'.$result->$row[created];
      
                                                                                                                                                                                                                             echo "jeff:  ".$_SESSION['email'];   
	   					}
                                                             //housekeeping and end session

						//$result->close();
						//$link->close();
						//session_unset();
			

}



?>


