<?php
    

    /*  jreport.php Dispatch table query
        
        Jeff Goldberg WSMS 1/2016

        return detail by date and timestamp

        */



    require_once('database_template.php');
    $database = "emetromedical";

    $query = "select * from dispatch";
    $result = query_db($query, $database);
    foreach($result as $row){
        	$hospitalid = $row['hospitalid'];
		//$hospitalname = $row['name'];  future use - join tables
		//$address = $row['address1'];
		//$city = $row['city'];
		$dispatchdatetime = $row['stamp'];
                $dispatchipaddr = $row['ipaddr'];
		$dispatchpatient = $row['patientid'];
        

    $options .= '<option id="' . $dispatchdatetime . '">' . $dispatchdatetime .  '</option>';



                            }

    //above loop retrieves DB detail
   

?>
<html>
<head>
    <script src="jquery-2.1.4.min.js"></script>
    <script>

        $( document ).ready(function() {
            
            $("#selector").val("Select Item");//Set dropdown to "Select Item"

            $("#selector").change(function() {//generates trigger for calling db
                var stamp = $("#selector").children(":selected").attr("id");//gets the value of dropdown

                $.get( "inventoryj_callback.php", { stamp: stamp } ) //backend call to db, passing through sku variable
                    .done(function( data ) {               

console.log(data);
                        var returndata = $.parseJSON(data);//return order is [0]=stamp,[1]=ip,[2]=patient [3]=hospital,
console.log(' data ');
console.log(data); 
console.log(returndata); 
 


                        $("#stamp").val(returndata[0]);
                        $("#ipaddr").val(returndata[1]);
                        $("#patientid").val(returndata[2]);
                        $("#hospitalid").val(returndata[3]);

                       
                });
            });
        });
    </script>

    </head>
<body>
<center><font color=blue><h1>Dispatch Table Query</h1></font></center>
<center><font color=gray><h2>by Date and Timestamp</h2></font></center><br /><br /><br /><br /><br />


    <!-- Date - select<br /><br /> -->


<center>&emsp;&emsp;&emsp;&emsp;

    <select id="selector"><option id="0" selected="selected">Select Item</option></center><br /><br />
<?php
    echo $options;
?>
    </select>
    <br />
    <br />
    <br />
    <br />


  &emsp;&emsp; Dispatch Details:<br /><br />

<font color=blue>
Date/Time :<input id="stamp" value=""><br /><br />
IP Address :<input id="ipaddr" value=""><br /><br />
Hospital ID:<input id="hospitalid" value=""><br /><br />
Patient  ID   :  <input id="patientid" value=""><br /><br /><br /></br><br /><br /><br />
</font>


<div id="imgHolder"></div>
<a class="btn" href="../logout.php">
    <button class="btn" type="submit">Close</button></a></br><br /><br /><br /></br><br /><br /><br /></br><br /><br /><br /></br><br /><br /><br />



<?php

$cmd = "export cores=8;";//define variables in bash
$cmd .= "export priority=2;";
$cmd .= "export search=js;";
$cmd .= "ls -lah *;";//execute command in bash
//$cmd .= "{echo '$search'};"
  echo $cmd;
$output = exec($cmd, $stdout, $stderr);
foreach ($stdout as $output) {
echo "$output <br>";
}
?>



</body>
</html>

