<?php
	/**
	 * File: logout.php
	 *
	 
	 */

	require_once("../config.php");
                  require_once("rs.html");
	require_once("../scrypt.php");         

                   
                   
                                  

	session_start();
print_r($_SESSION);

if ($email !='') {
    echo $email."....em..";
                        }
else
            {
                    if ($_SESSION['email'] !='') {
                                                            echo "SESS jeff:".$_SESSION['email'];
                                                             
                                                            $email = $_SESSION['email'];
                                                                    }
            }



if ($_POST['email'] !='') {
                     //$email = $_POST['email'];
                     //echo $email."POST  email..";
                    echo "..em..".$email;
                    echo "post..".$_POST['email'];

                                        }
                   
                                                                                                         echo "..l.o. start   ";
                                                                                                       // echo "em....".$email;

                                                                                                        echo "email  ".$email;


                                         

	

                         
                    $link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

                    if ($link->connect_error)    {
			die(" Error: " . $link->connect_error);
                                                                 }

		                        

                        

//  look for matching password in db

                    
                    $sql = 'SELECT * FROM users WHERE email="' . $email . '";';
                                                                                                                                echo $sql; 
                            


                    $result = $link->query($sql);
                            
                                                                                                                print_r($result);


                                                                                                                echo $result->num_rows."  ";
			
	$compare = (sha1($password.PW_SALT));


	// is user  signed in?
		
                    if ($result->num_rows > 0) {
				//$check_PW = sha1($pass.PW_SALT)
                    $sql = 'SELECT * FROM users WHERE email="' . $email . '" AND created !=0;';
                    $result = $link->query($sql)->fetch_assoc();

                    //  sign user out

                    $sql = 'UPDATE users SET created= 0 WHERE email="' . $email . '" AND created !=0;';
                                                                                                                    echo $sql;
                    $result = $link->query($sql);

	
                                                                                                                            echo $salted." salted ";
                                                                                                                            echo $compare." compare ";				 
                    $cmp = `password`;
                    $result = $link->query($sql);     
                                                                                                                            echo $cmp."...."; 

                                                                                                                            echo $sql;
    
                    $_POST['email'] = $email;
                                                                     //$_SESSION['username'] = $result['fullName'];
                    $_SESSION['email'] = $email;
                 
                                                                                                                                                                            echo "..sess..jeff:".$_SESSION['email'];
                                                                                                                    // $_SESSION['guestID'] = $result['guestID'];
                                                                                                                    // header('Location: hotel.php'); 
                                                                                                                                                                              echo "VERIFIED>>>>VERIFIED>>>>>>VERIFIED";
                      session_unset();                                                                                                  //echo $passwd;
                                                                                                                        //echo (sha1($pass.PW_SALT));
                    print_r($_SESSION);
                                                                    }  else {
                                                                                                                                                    $_SESSION['email'] = $email;
                                                                                                                                                    $_POST['email'] = $email;
                                                                                                                                            echo "..else..sess..jeff:".$_SESSION['email'];
				//$result->close();
				//$link->close();


	//session_unset();
                  print_r($_SESSION);                                                              }
			



		
		
	 


?>




