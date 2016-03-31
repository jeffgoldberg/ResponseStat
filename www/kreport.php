<?php

    session_start();
    require_once('/var/www/config.php');
	
	$records_per_page = 100;
	$cur_page = (int)$_GET['cur_page'];
	if (!$cur_page || $cur_page == 0){
	    $cur_page=1;
	}

	//need: host, user, password, database
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, "emetromedical");

	//GET COUNT OF RECORDS
	$sql_count = "SELECT count(*) AS COUNT FROM dispatch
		INNER JOIN hospital ON dispatch.hospitalid=hospital.hospitalid";
	$result1 = $link->query($sql_count);
	foreach ($result1 as $row){
		$total_records = $row['COUNT'];
	}

    //join query notes

	//SELECT dispatch.hospitalid, hospital.name, hospital.address1, hospital.city, dispatch.stamp AS DispatchDateTimeStamp
	//FROM dispatch, hospital
	//WHERE dispatch.hospitalid = hospital.hospitalid

	//run the actual query
	$sql_query = "SELECT dispatch.hospitalid, hospital.name, hospital.address1, hospital.city, dispatch.stamp
	 FROM dispatch
		      INNER JOIN hospital ON dispatch.hospitalid=hospital.hospitalid
		      LIMIT 0,".$records_per_page;
	$result = $link->query($sql_query);	

	//REPORT HEADER
	$content = '<table width="100%"><thead><tr>';
	$content .= '<td width="20%">ID</td><td width="20%">HospitalName</td><td width="20%">Address</td><td width="20%">City</td><td width="20%">DispatchDateTime</td></thead>';
	$content .= "<tbody>";

	foreach($result as $row){
		//COLLECT INFO FROM DB -> ASSIGN TO VARIABLES
		$hospitalid = $row['hospitalid'];
		$hospitalname = $row['name'];
		$address = $row['address1'];
		$city = $row['city'];
		$dispatchdatetime = $row['stamp'];

		//APPEND INFO FROM VARIABLES TO OUTPUT BUFFER/VARIABLE
		$content .= "<td>".$hospitalid."</td><td>".$hospitalname."</td><td>".$address."</td><td>".$city."</td><td>".$dispatchdatetime."</td></tr>";
	}

	//REPORT FOOTER
	$prev_page = $cur_page -1;
	$next_page = $cur_page +1;
	if ($cur_page > 1){
	    $pagination = '<a href="report.php?cur_page='.$prev_page.'"><<< Previous</a>';
	}
	$pagination .= '&nbsp;<a href="report.php?cur_page='.$next_page.'">Next >>></a>';
	$pages = ceil($total_records/$records_per_page);

	$content .= '<tr><td align="center" colspan=5>'.$pagination.'</td></tr>';
	$content .= '<tr><td align="center" colspan=5>Total Pages:'.$pages.'</td></tr>';

	$content .= "</tbody></table><hr>";
	
	echo $content;
?>
