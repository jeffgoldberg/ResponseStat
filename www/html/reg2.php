
<html>
<?php
echo "1"
?>
<link href="bootstrap.min.css" rel="stylesheet">
<script src="jquery-2.1.4.min.js"></script>
<script src="bootstrap.min.js"></script>

<?php echo "b" ?> 

<style>

body    {
	background: url("bg.png") no-repeat center;
	}
</style>

 <?php echo "c" ?> 
 
 <script>
 $( document ).ready(function(){
 	<?php echo "dready" ?>
 	$("#reg").click(function(){
 		var email = $("#email").val();
 		var pass = $("pass").val();
 		window.alert($email);
 		
 		//pass variable to server
 		$.post("dataImport.php", {temail: email, tpass: pass }, function(data){
 		   $("#main").html(data);
 		   });
 		})
 	})
 	</script>
 
</html>

