<?php
    

    /*  jreport.php User table query
        
        Jeff Goldberg WSMS 1/2016

        return detail by username

    */



    require_once('database_template.php');
    $database = "users";

    $query = "select * from users";
    $result = query_db($query, $database);
    foreach($result as $row){
        	$username = $row['username'];
		$email = $row['email'];
                $created = $row['created'];
		
        
    $options .= '<option id="' . $username . '">' . $username .  '</option>';



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
                var username = $("#selector").children(":selected").attr("id");//gets the value of dropdown
                $.get( "userCallback.php", { username: username } ) //backend call to db, passing through sku variable
                    .done(function( data ) {               
console.log(' pr1-data ');
console.log(data);
                        var returndata = $.parseJSON(data);//return order is [0]=username,[1]=email,[2]=created 
console.log(' data ');
console.log(data); 
console.log(returndata); 
 


                        $("#username").val(returndata[0]);
                        $("#email").val(returndata[1]);
                        $("#created").val(returndata[2]);
                        

                       
                });
            });
        });
    </script>

    </head>
<body>
<center><font color=blue><h1>Users Table Query</h1></font></center>
<center><font color=gray><h2>by User</h2></font></center><br /><br /><br /><br /><br />


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


  &emsp;&emsp; User Details:<br /><br />

<font color=blue>
User:&emsp;&emsp;&emsp;&emsp;<input id="username" value=""><br /><br />
eMail add:&emsp;&emsp;<input id="email" value=""><br /><br />
Signed In:&emsp;&emsp;<input id="created" value=""><br /><br />
<br /><br /><br /></br><br /><br /><br />
</font>


<div id="imgHolder"></div>
<a class="btn" href="../logout.php">
    <button class="btn" type="submit">Close</button></a></br><br /><br /><br /></br><br /><br /><br /></br><br /><br /><br /></br><br /><br /><br />






</body>
</html>


