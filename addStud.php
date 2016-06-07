<!DOCTYPE html>
<html>
<head>
	<title>Add Student Auth</title>
</head>
<body>
<?php
require "connect.php";
//echo "Connected to $db_name";


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$name = $_POST["Name"];
$roll = $_POST["Roll"];
$dept = $_POST["dept"];
$email = $_POST["email"];
$address = $_POST["address"];
$about = $_POST["about"];
$pass = "Password";

$message = "Hello";

//echo "Data entered is $name <br/>$roll<br/>$dept<br/>$email<br/>$address<br/>$about<br/>$pass";
$mysql_qry = "insert into spider_2016_2(Roll,Name,Dept,Email,Address,About,Password) values('$roll','$name','$dept','$email','$address','$about','$pass')";
if(mysqli_query($conn,$mysql_qry)){
	echo "<br/>New Record created succesfully";
	$message = "Your password is $pass";
	echo "<script>alert('$message'); window.location.href='/Spider_2016_2/';</script>";
	
	//$redirect_page = '/Spider_2016_2/';
}
else{
	echo "<br/>Couldn\'t create record.";
	$message = "Unsuccessful!!";
	echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/addData.html';</script>";
	//$redirect_page = '/Spider_2016_2/addData.html';
	
}
//header('Location: '.$redirect_page);
?>
</body>
</html>