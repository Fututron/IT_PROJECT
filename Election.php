<html>
<head>
<?php

	$db_host="localhost";
	$db_user="root";
	$db_pass="tiger";
	$db_name="election";

	$dbh=mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die ("Error connecting to database");

	$section=$_SESSION['section'];
	$query="select id,name from cr where section=$section;";
	$result=mysqli_query($dbh,$query);
?>

<style>
   body{
	text-align:center;
    }
</style>
</head>
<body>
	<?php while($row=mysqli_fetch_array($result)){ ?>
	<form id="myform" action="submit" method="post">
	<input type="radio" name="candidate" id="name1" value="<?php echo $row['name']?>"><?php echo $row['name'] ?><br /><?php } ?>
<input type="submit" value="submit"/>
</form> 	
	
