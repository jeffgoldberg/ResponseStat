<?php
    //24-OCT-2015
    //file: index.php
?>
<html>
<head>
<script src="lib/jquery-2.1.4.min.js"></script>
<script>
$( document ).ready(function() {//DOCUMENT IS FULLY LOADED ON CLIENT (BROWSER)
alert("tyy");
<?php
//LOOP THROUGH ADS TO DISPLAY - ACTIONS
for ($counter = 1; $counter <= 2; $counter++) {

    echo '
	$( "#ad'.$counter.'" ).click(function() {//CHECK FOR CLICK EVENT ON ID
	    var ad = "'.$counter.'";
	    $.post( "log.php", { ad: ad, action: "1" })
               .done(function(data){
                alert("data:"+data);
            });

	});
	$( "#ad'.$counter.'" ).mouseover(function() {//CHECK FOR HOVER EVENT ON ID
	    var ad = "'.$counter.'";
	  $.post( "log.php", { ad: ad, action: "2" } );
	});
/*
	$( "#ad'.$counter.'" ).mouseout(function() {//CHECK FOR HOVER EVENT ON ID
	    var ad = "'.$counter.'";
	  $.post( "log.php", { ad: ad, action: "3" } );
	});
*/
	';

}
?>
});
</script>
</head>
<h1>Marketing App</h1><br />
COUNTING CLICKS<br />
<div style="float: left;">Banner ad1:<img src="ad_repository/ad1.jpg" id="ad1"></div>
<div style="float: right;">Banner ad2:<img src="ad_repository/ad2.jpg" id="ad2"></div>
</html>
