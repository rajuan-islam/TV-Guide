<?php
	//echo "Tv Guide database connection test<br>";

	$tv_db_host = 'localhost';
	$tv_db_user = 'root';
	$tv_db_pass = '';

	if( @mysql_connect($tv_db_host,$tv_db_user,$tv_db_pass) ) {
		//echo "MySQL connection successful!<br>";
	} else {
		echo "Error: MySQL connection<br>";
	}

	$tv_database_name = 'tvguide';
	if( @mysql_select_db($tv_database_name) ) {
		//echo $tv_database_name." database connection successful!<br>";
	} else {
		echo "Error: database connection<br>";	
	}
?>