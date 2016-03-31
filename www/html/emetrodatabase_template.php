<?php
	// 
  	//     emetrodatabase.php
        //
        //     Jeff Goldberg WSMS 1/2016
        //  


    session_start();
    require_once('/var/www/configk.php');  // Database configuration

    function query_db($query, $database = "emetromedical"){
    	
	//need: host, user, password, database
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, $database);

	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	//run the actual query
	$result = $link->query($query);

	mysqli_close($link);

	return $result;
    }//end function 

    //DO NOT TOUCH ABOVE THIS LINE - GENERAL DB FUNCTIONS

    
?>
