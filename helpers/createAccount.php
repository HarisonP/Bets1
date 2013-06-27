<?php
	include_once '/helpers/config.php';
	define("NOT_COMFORMT_PASSWORD", "missMatch" );
	define("NOT_VALID_EMAIL","unvalidEmail.");
	define("NOT_LONG_ENOGHT_USERNAME","namenotLongEnoght");
	define("NOT_LONG_ENOGHT_PASS","passnotLongEnoght");
	
	function isAlphanumeric($str)
	{
		$specialSymbols=array('@','!','#','$','%','^','&','*','_','+');
		for($i = 0 ; $i < strlen($str);$i++)
		{
			$ch = $str[$i] ;
			$isLowercaseLetter = ($ch >= 'a') && ($ch <= 'z') ;
			$isUppercaseLetter = $ch >= 'A' && $ch <= 'Z' ;
			$isNumber = $ch >= '0' && $ch <= '9' ;
			$isSpecial = false;
			
			if(in_array($str, $specialSymbols))
				$isSpecial=true;
			if(!$isLowercaseLetter && !$isUppercaseLetter && !$isNumber && !$isSpecial)
			{
				return false;
			}
		}
		return true;
	}
	function generateSalt()
	{
		$sizeOfTheSalt=rand(5,20);
		$salt="";
		for($i=0 ; $i<$sizeOfTheSalt; ++$i)
		{
			$salt=$salt.(chr(rand(ord('a'),ord('z'))));	
		}
		return $salt;
	}
	function checkData($username,$password,$repassword,$email)
	{
		global $typeError;
		$flag=1;
		if($password!=$repassword)
		{
			$typeError['NOT_COMFORMT_PASSWORD']=1;
			$flag=0;

		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$typeError['NOT_VALID_EMAIL']=1;
			$flag=0;		}
		if(mb_strlen($username) < 4 || mb_strlen($username) > 40 || !isAlphanumeric($username)) 
		{
			$typeError['NOT_LONG_ENOGHT_USERNAME']=1;
			$flag=0;
		}
		if (mb_strlen($password) <= 6) 
		{
			$typeError['NOT_LONG_ENOGHT_PASS']=1;
			$flag=0;
		}

		return $flag;
	}
	function register($username,$password, $email)
	{
		global $typeError;
		$mysql=getDBConnection();
		if($mysql===false)
			$typeError['conn_fail']=1;
			
		$mysql->real_escape_string($username);
		$mysql->real_escape_string($email);
		$salt=generateSalt();
		$password=hashPassword($password,$salt);
		$sql="INSERT INTO `users` SET  `Username`= \"". $username. "\",`Hash`= \"". $password ."\" ,`Salt`= \"". $salt."\" ,`Email`= \"".$email."\"";
		$result=$mysql->query($sql);
		if(!$result)
		{
			
			$emailTaken="Duplicate entry '".$email. "' for key 'Email_UNIQUE'";
			$nameTaken="Duplicate entry '".$username. "' for key 'Username_UNIQUE'";
			if($mysql->error===$emailTaken)
			{
				$typeError['TAKEN_EMAIL']=1;
			
			}
			if($mysql->error==$nameTaken)
			{
				$typeError['USERNAME_TAKEN']=1;
			}
		}
		else
		{
			$typeError['ok']=1;
		}
	}
//main
	$typeError= array('NOT_COMFORMT_PASSWORD' => 0 , 
		'NOT_VALID_EMAIL' => 0,
		'NOT_LONG_ENOGHT_USERNAME'=>0,
		'NOT_LONG_ENOGHT_PASS'=>0,
		'conn_fail'=>0,
		'TAKEN_EMAIL'=>0,
		'ok'=>0,
		'USERNAME_TAKEN'=>0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	if(isset($_POST['name']) && $_POST['password']!="" && $_POST['repassword']!="" && isset($_POST['email']) )
	{
		class Userinfo 
		{
		 	public $name;
		 	public $password;
		 	public $repassword;
	 		public $email;
	 	}
		$user=new Userinfo;
		$user->name=$_POST['name'];	
		$user->password=$_POST['password'];
		$user->repassword=$_POST['repassword'];
		$user->email=$_POST['email'];
	} 
	else 
	{
		header("Location:registration.php");
	}
	if(checkData($user->name,$user->password,$user->repassword,$user->email))
	{
		register($user->name,$user->password,$user->email);
	}
	else 
	{
	
	}
}		

