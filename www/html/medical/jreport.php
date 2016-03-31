<?php
    
    require_once('database_template.php');
    $database = "emetromedical";

    $query = "select * from dispatch";
    $result = query_db($query, $database);
    foreach($result as $row){
        	$hospitalid = $row['hospitalid'];
		//$hospitalname = $row['name'];
		//$address = $row['address1'];
		//$city = $row['city'];
		$dispatchdatetime = $row['stamp'];
                $dispatchipaddr = $row['ipaddr'];
		$dispatchpatient = $row['patientid'];
        //$options .= '<option id="' . $sku . '">' . $name . '</option>';
 $options .= '<option id="' . $dispatchdatetime . '">' . $dispatchdatetime .  '</option>';
//echo $dispatchipaddr;  echo $dispatchpatient;  echo $dispatchdatetime; echo '..'; echo $options;
    }

    //above loop replicates the following options for each item in inventory
    //<option id="d1">Dining Room</option>

?>
<html>
<head>
    <script src="jquery-2.1.4.min.js"></script>
    <script>

        $( document ).ready(function() {
            //$("#price").val("");//initialize price to $0
            $("#selector").val("Select Item");//Set dropdown to "Select Item"

            $("#selector").change(function() {//generates trigger for calling db
                var stamp = $("#selector").children(":selected").attr("id");//gets the value of dropdown
//console.log(stamp); console.log('stp');
                $.get( "inventoryj_callback.php", { stamp: stamp } ) //backend call to db, passing through sku variable
                    .done(function( data ) {               
console.log(' data ');
console.log(data);
                        var returndata = $.parseJSON(data);//return order is [0]=stamp,[1]=ip,[2]=patient [3]=hospital,
                     console.log(' data ');
console.log(data); console.log(returndata); 
 


                        $("#stamp").val(returndata[0]);
                        $("#ipaddr").val(returndata[1]);
                        $("#patientid").val(returndata[2]);
                        $("#hospitalid").val(returndata[3]);
//console.log('rrr');
//alert( data1 );
 console.log( data );                       //$("#imgHolder").html("<a href='details.php?sku=" + sku + "'><img src='furniture/" + filename + "'></a>");//e-commerce module
                       // $("#imgHolder").html("<img src='furniture/" + filename + "'>");//showroom
                });
            });
        });
    </script>

    </head>
<body>
<center><h1>Dispatch Table Query by Date and Timestamp</h1></center><br />
    Date - select<br />

<select id="selector"><option id="0" selected="selected">Select Item</option>
<?php
    echo $options;
?>
</select>
<br />
<br />
Dispatch Details:<br /><br />
Date/Time :<input id="stamp" value=""><br /><br />
IP Address :<input id="ipaddr" value=""><br /><br />
Hospital ID:<input id="hospitalid" value=""><br /><br />
Patient ID  : <input id="patientid" value=""><br /><br /><br />
<div id="imgHolder"></div>

<?php

$cmd = "export cores=8;";//define variables in bash
$cmd .= "export priority=2;";
$cmd .= "export search=js;";
$cmd .= "ls -lah *;";//execute command in bash
//$cmd .= "{echo '$search'};"
echo $cmd;
$output = exec($cmd, $stdout, $stderr);
echo $stdout;//return standard out from bash
?>
<a class="btn" href="../logout.php">
    <button class="btn" type="submit">Close</button></a>
</body>
</html>

