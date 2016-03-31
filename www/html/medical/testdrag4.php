<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 10/29/2015
 * Time: 9:15 PM
 */
session_start();
require_once('/var/www/config.php');
require_once('../rs2.html');

function query_db($query){
    //need: host, user, password, database
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

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

//START WEB PAGE

?>


<script src="lib/jquery-2.1.4.min.js"></script>
<script>
    $( document ).ready(function() {//DOCUMENT IS FULLY LOADED ON CLIENT (BROWSER)

        $( "#draggable" ).click(function() {//CHECK FOR CLICK EVENT ON ID

                });
        });


        });
//    });
</script>




<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Droppable - Default functionality</title>
<div class="holder">
  <a href="#"><img src="../statBanner.jpg"style="float:left;   height="80" width="600" data-toggle="modal" data-target="#outModal"></a>
                 
         
</div>


  <img src="../erPic.jpg" alt="../erPic.jpg" href="../logout.php" target="../logout.php" style="float:right;width:650px;height:150px;">


  <p><br><font color = 'yellow' </p><h3>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Emergency Medical Services </h3>
  <p><font color = 'white'><h4>&emsp;&emsp;&emsp;&emsp;Drag and drop patient icon to one of the hospitals on the right.</h4></font></p>
  <p><font color = 'white'><h4>&emsp;&emsp;&emsp;&emsp;Patient will be routed to the emergency room at that hospital.</h4></font></p>

</br>

<a class="btn" href="../kreport.php">
    <button class="btn" type="submit">Run Report</button></a>
<a class="btn" href="../jreport.php">
    <button class="btn" type="submit">Run Query</button></a>
							





  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script src="lib/jquery-ui.js"></script>

  <link rel="stylesheet" href="lib/style.css"> 
<!-- Bootstrap core CSS -->
	<link href="bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Cosmo Theme CSS -->
	<link href="spacelab.bootstrap.min.css" rel="stylesheet"
	        integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w=="
	        crossorigin="anonymous">

  <style>
  #draggable { width: 250px; height: 150px; padding: 2.5em; float: left; margin: 10px 10px 10px 0; }
  #droppable { width: 300px; height: 600px; padding: 0.5em; float: right; margin: 10px; }
  #droppable2 { width: 300px; height: 600px; padding: 0.5em; float: right; margin: 10px; }
  </style>
  <script>

$(function() {
    $( "#draggable" ).draggable();
    $( "#droppable" ).droppable({
    drop: function( event, ui ) {
      $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
          .html( "Patient routed to Sharp Memorial" );

//		Post to database patient routed to Sharp Memorial
        $.post( "log.php", { ad: "1", action: "1", hospitalid: "2", patientid: "1" } )
            .done(function( data ) {
//		    alert( "Data Loaded: " + data );
            });

    }
  });
  $( "#droppable2" ).droppable({
    drop: function( event, ui ) {
      $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
          .html( "Patient routed to Sharp Grossmont" );


//		Post to database patient routed to Sharp Grossmont
        $.post( "log.php", { ad: "1", action: "1", hospitalid: "1", patientid: "1"} )
            .done(function( data ) {
//		    alert( "Data Loaded: " + data );
            });



        }
  });
  });
  </script>
</head>
<!-- <body> -->
<body style="background-image:url(./lib/background.jpg);background-repeat: no-repeat; background-size: 1800px, 900px, auto;">
<div id="draggable" class="ui-widget-content" align = center>
  <img src="ad_repository/pia_picture_w150_h150.png">
  <p><font color = 'yellow'><h4>Patient:<br><font color = 'white' >K_ONEIL</h4></p>
  <p><font color = 'yellow'><h4>Assessment:<br> <font color = 'white' >C-spine and internal injuries, auto accident</h4></font></p>
  <p><font color = 'yellow'><h4>Current Location:<br><font color = 'white'> 163 south bound, 1/2 mile south of Balboa Ave. ext</h4></font></p>
</div>

<div id="droppable" class="ui-widget-header">
  <img src="ad_repository/sharp_er.jpg">
  <p>No 2: Sharp Memorial Hospital <br>Emergency Room
  <br>7901 Frost St, <br>San Diego, CA 92123</br></p>
<!--  <br>Transfer/Drop here</br>-->

</div>

<div id="droppable2" class="ui-widget-header">
  <img src="ad_repository/sharp_grossmont_er.jpg">
  <p>No 1: Sharp Grossmont Hospital <br>Emergency Care
  <br>5555 Grossmont Center Drive, <br>La Mesa, CA 91942</br></p>
<!--  <p>Transfer/Drop here</p>-->
</div>
</body>
</html>


