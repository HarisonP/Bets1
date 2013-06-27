<?php
	define("_APPROOT","./");	 				#Application root
	define("_MYSQLSERVER","localhost:3306"); 	#MySQL server location
	define("_MYSQLUSER","root"); 				#MySQL user
	define("_MYSQLPASSWORD",""); 				#password for the user
	define("_MYSQLDATABASE","usersandbetts"); 		#database name
	function hashPassword($password,$salt)
	{
		$result=$password.$salt;
		$result=md5($result);
		return $result;
	}
	function getDBConnection()
	{
	
		return mysqli_connect(_MYSQLSERVER,_MYSQLUSER,_MYSQLPASSWORD,_MYSQLDATABASE);
	}
?>
