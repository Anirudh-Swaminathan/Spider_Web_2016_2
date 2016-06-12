<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Auth</title>
</head>
<body>
<?php
//Connect to the db.
require "connect.php";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//Error messages
$message = "Hello";

function validateInp($n,$ad,$p){
	
	global $message;
	//Test name
	if(!(preg_match('/[a-zA-Z][a-zA-Z ]+|[a-zA-Z]$/',$n))){
		$message = "Name should contain only aphabets and spaces";
		echo "<script>alert('$message');</script>";
		return false;
	}
	if(!(preg_match("/[a-zA-Z]/",$n))){
		$message = "Name must contain atleast 1 alphabet";
		echo "<script>alert('$message');</script>";
		return false;
	}
	if(preg_match("/\d/",$n)){
		$message = "Name should not contain any numbers";
		echo "<script>alert('$message');</script>";
		return false;
	}
	
	//Address must not be null
	if(!strcmp($ad,"")) {
		echo "<script>alert('Null address');</script>";
		return false;
	}
	//Password must not be null
	if(!strcmp($p,"")){
		echo "<script>alert('Null Password');</script>";
		return false;
	}
	return true;
}

//Get the name.address,about and password
$name = $_POST["Name"];
$address = $_POST["address"];
$about = $_POST["about"];
$pass = $_POST["Pass"];

if(validateInp($name,$address,$pass)){
	$roll = $_SESSION["Roll"];
	$roll = (int) $roll;
	
	//Prepare the statement to prevent SQL Injection
	$sql = $conn->prepare("SELECT Password FROM spider_2016_2 where Roll = ?");
	$sql->bind_param("i",$roll);   
	$sql->execute();
	
	$sql->bind_result($pas);
	$sql->store_result();
	while ($sql->fetch()) {
		//Do nothing
	}
	
	//If the passwords match, execute the statement.
	if(strcmp($pass,$pas) == 0){
		echo "Passwords match";
		$mysql_qry = $conn->prepare("update spider_2016_2 set Name = ?, Address = ?, About = ? where Roll = ?");
		$mysql_qry->bind_param("ssss",$name,$address,$about,$roll);
		$bo = $mysql_qry->execute();
		//If the update was successful alert update successful
		if($bo){
			echo "<br/>Student details for ".$roll." updated succesfully";
			echo "<script>alert('Data has been updated successfully');  window.location.href='/Spider_2016_2/viewData.html';</script>";
		}
		//else, alert failed update.
		else{
			echo "<br/>Couldn\'t update record.<br/>";
			$message = "Unsuccessful!!";
			echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/viewData.html';</script>";
			//header('Location: http://localhost/Spider_2016_2/viewData.html');
			//exit;
		}
		$mysql_qry->close();
		$conn->close();
	}
	else{
		echo "Unequal passwords<br/>";
		echo "<script type='text/javascript'>alert('Incorrect Password');window.location.href='/Spider_2016_2/viewData.html'</script>;";
	}
}
else{
	echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/viewData.html';</script>";
}

session_unset();
session_destroy();
ob_flush();
?>
</body>
</html>