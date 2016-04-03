<?php
    

    /* utreport.php User table query
        
        Jeff Goldberg WSMS 1/2016

        return detail by timestamp

    */



    require_once('database_template.php');
    $database = "users";

    $query = "select * from users";
    $result = query_db($query, $database);
    foreach($result as $row){
        	$username = $row['username'];
		$email = $row['email'];
                $created = $row['created'];

// signed in user will have a positive timestamp
	
    if ($created > 0) {
    
    $options .= '<option id="' . $created . '">' . $username .  '</option>';
			}


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
                var created = $("#selector").children(":selected").attr("id");//gets the value of dropdown


                $.get( "usertCallback.php", { created: created } ) //backend call to db, passing through user signon variable
                    .done(function( data ) {               


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
<center><font color=gray><h2>by User Signin Status</h2></font></center><br /><br /><br /><br /><br />


    <!-- Date - select<br /><br /> -->


<center>

    <select id="selector"><option id="0" selected="selected">Select Item</option></center><br /><br />
<?php
    echo $options;
?>
    </select>
    <br />
    <br />
    <br />
    <br />


User Signin Status:<br /><br /><br />

<font color=blue>
User ID :  &emsp; <input id="username" value=""><br /><br />
eMail   :  &emsp;&emsp;<input id="email" value=""><br /><br />
Signed In:&emsp;<input id="created" value=""><br /><br />
<br /><br /><br /></br><br /><br /><br />
</font>


<div id="imgHolder"></div>
<a class="btn" href="../logout.php">
    <button class="btn" type="submit">Close</button></a></br><br /><br /><br /></br><br /><br /><br /></br><br /><br /><br /></br><br /><br /><br />






</body>
</html>