<html>

<?php echo "a" ?> 





<link href="./bootstrap.min.css" rel="stylesheet">
<script src="./jquery-2.1.4.min.js"> </script>
<script src="./bootstrap.min.js"> </script>
<script src="./jquery.min.js"> </script>


<?php echo "b" ?>
<script $.noConflict( false )> </script>

<?php echo "d" ?>
    
<style>

body {
	    background: url("bg.png") no-repeat center;
     }

</style>

 <?php echo "e" ?>
 
<script> 
jQuery ( document ).ready(function() { 
       
 
	
  	   $("#reg").click(function() {
    	var email = $("#email").val();
	   	var pass = $("#pass").val();
		
//		
//		//pass variable to server
  $.post( "dataImport.php", {temail: email, tpass: pass }, function(data) {
		$("#main").html(data);
                  alert( "post" );
		});
	});
                   
});
</script>

<body>
 <?php echo "f" ?>
<input type="text" id="email"><input type="text" id="pass"><button id="reg"
class="btn btn-lg btn-primary">Register</button>
<?php echo "g" ?>
<div class="container" id="main"></div>
</body>
</html>
		