<?php
	//24-OCT-2015
  	//file: log.php

    session_start();
    require_once('/var/www/configk.php');
echo '  start log ...';
    function query_db($query){
	//need: host, user, password, database
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, "emetromedical");

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
    }//end function query_db

    //DO NOT TOUCH ABOVE THIS LINE - GENERAL DB FUNCTIONS

    $ad = (int)$_POST['ad'];
    $action = (int)$_POST['action'];
    $hospitalid = (int)$_POST['hospitalid'];
    $patientid = (int)$_POST['patientid'];
    /*
    echo "data stored: ";
    echo "ad: ".$ad."<br />";
    echo "action:".$action;

    $ip=$_SERVER['REMOTE_ADDR'];
  
    $ip=$_SERVER['SERVER_ADDR'];
*/
    $ip = exec('curl http://ipecho.net/plain; echo');
 echo "IP address= $ip";
    //build query
	//action codes: 1=click, 2=mouseover, 3=mouseout
	//store: ip, ad, action, timedate
    $query = "INSERT INTO dispatch (action, stamp, adid, ipaddr, hospitalid, patientid) VALUES ('".$action."', now(), '".$ad."', '".$ip."', '".$hospitalid."', '".$patientid."')";
echo $query;
    query_db($query);

$now = date('Y-m-d H:i:s');

$cmd = 'mosquitto_pub -h localhost -t emetro -m "patient K_ONEIL enroute to: "'.$hospitalid.';';
exec($cmd, $stdout, $stderr);

$cmd2 = 'mosquitto_pub -h localhost -t emetro -m "'.$now.'";';
exec($cmd2, $stdout, $stderr);


if ($hospitalid == 1 ) {
                        $cmd="ssmtp jeffgoldberg1@gmail.com < /emailh1.txt";}
                        else{

                        $cmd="ssmtp jeffgoldberg1@gmail.com < /emailh2.txt";}

exec($cmd, $stdout, $stderr);
echo "hi bob";
?>