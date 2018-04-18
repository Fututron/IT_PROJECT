<?php
	session_start();
	$db_host="localhost";
	$db_user="root";
	$db_pass="tiger";
	$db_name="election";
	
	$dbh=mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("Error connecting to Databsase");

	$username=$_POST['username'];
	$password=$_POST['password'];
	$_SESSION['username']=$username;
	$query="select * from login where id='$username';";
	$result=mysqli_query($dbh,$query) or die("Nope");
	$row=mysqli_fetch_array($result);
	$_SESSION['section']=$row['section'];
	if($password==$row['password']&&$row['voted']==0)
		header('location:Election.php');
	elseif($password==$row['password']&&$row['voted']==1)
		header('location:home.php?err=2');
	else
		header('location:home.php?err=1');
		
?>
