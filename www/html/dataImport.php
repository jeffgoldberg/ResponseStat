<?php
// @(#) $Id$
// +-----------------------------------------------------------------------+
// | Copyright (C) 2008, http://yoursite                                   |
// +-----------------------------------------------------------------------+
// | This file is free software; you can redistribute it and/or modify     |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation; either version 2 of the License, or     |
// | (at your option) any later version.                                   |
// | This file is distributed in the hope that it will be useful           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of        |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the          |
// | GNU General Public License for more details.                          |
// +-----------------------------------------------------------------------+
// | Author: pFa                                                           |
// +-----------------------------------------------------------------------+
//



	$email = $_POST['temail'];
	$pass = $_POST['tpass'];
	echo "dataImport start  ";
        echo "$email";
	$result = check_db($email, $pass);
	if (result == true){
		echo "welcome, brother/sister";
	}
	else{
	     echo "you forgot password";
	}
	
	function check_db($email, $pass){
		$result = false;
		
		//query db for user
		//$query (SQL)
		if ($pass == $db_pass) {
			$result = true;
		}
		$result = true;
                echo "result:  " . $result . "  ";
		return $result;
	}
?>

		
