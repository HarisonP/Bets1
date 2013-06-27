<?php
include_once 'config.php';
$typeError=array('conn_fail'=>0,'wrong_username'=>0,'wrong_pass'=>0);
function login($username,$password)
{
	global $typeError;
	$mysqli=getDBConnection();
	if(!$mysqli)
	{
		$typeError['conn_fail']=1;
		return false;
	}
	$mysqli->real_escape_string($username);
	$sql="SELECT  `Username`, `Hash`, `Salt` FROM `users` WHERE `Username`=\"".$username."\" LIMIT 1";
	$result=$mysqli->query($sql);
	$row=$result->fetch_object();
	if(!isset($row))
	{
		$typeError['wrong_username']=true;
		return false;
	}
	$password=hashPassword($password,$row->Salt);
	if($password===$row->Hash)
	{
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['logedIn']=true;
		return true;
	}
	else
	{
		$typeError['wrong_pass']=true;
		return fasle;
	}
	return fasle;

}
if($_SERVER['REQUEST_METHOD']==="POST")
{
	$username=$_POST['userName'];
	$password=$_POST['password'];
	if(login($username,$password))
	{
		header("Location: ./index.php");
	}
}
