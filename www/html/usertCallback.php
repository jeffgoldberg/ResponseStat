<?php 


//   JSON Callback to database for specific row detail
//   
//   Jeff Goldberg WSMS 1/2016
// 
//   usertCallback.php component of ureport.php
// 


   
//echo "xtart cback....";
 //echo "start cback2...";   

    require_once('database_template.php');

    $database = "users";


//echo "start cback3...";


    $created = $_GET['created'];


//echo  "start cback.aft .get..";
    

    
    $query = "SELECT * FROM users WHERE created ='".$created."'";
//echo $query;
 
    $results = query_db($query, $database);
   
    foreach($results as $row){
        $aryDetails[0] = $row['username'];
        $aryDetails[1] = $row['email'];
        $aryDetails[2] = $row['created'];
       
    }

    echo json_encode($aryDetails);
 
?>
