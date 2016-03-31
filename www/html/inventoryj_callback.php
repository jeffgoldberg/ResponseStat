<?php 


//   JSON Callback to database for specific row detail
//   
//   Jeff Goldberg WSMS 1/2016
// 
//   inventoryj_callback.php component of jreport.php
// 


   
//echo "xtart cback....";
 //echo "start cback2...";   

    require_once('emetrodatabase_template.php');

    $database = "emetromedical";


//echo "start cback3...";


    $stamp = $_GET['stamp'];


//echo $stamp; echo "start cback.aft .get..";
    

    
    $query = "SELECT * FROM dispatch WHERE stamp ='".$stamp."'";
//echo $query;
 
    $results = query_db($query, $database);
   
    foreach($results as $row){
        $aryDetails[0] = $row['stamp'];
        $aryDetails[1] = $row['ipaddr'];
        $aryDetails[2] = $row['patientid'];
        $aryDetails[3] = $row['hospitalid'];
    }

    echo json_encode($aryDetails);
 
?>
