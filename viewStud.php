<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Student Auth</title>
	</head>
<body>
<?php
//Connect to the database.
require "connect.php";


//Make the form to resubmit on reload.
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//Error message variable.
$message = "Hello";

//Function to validate the input.
function validateInp($r){
	global $message;
	
	//Check roll number
	if(!(preg_match("/^[0-9]{9}$/",$r))){
		$message = "Invalid roll number";
		echo "<script>alert('$message');</script>";
		return false;
	}

	if(floor($r/pow(10,8)) != 1){
		$message = "Incorrect roll number";
		echo "<script>alert('$message');</script>";
		return false;
	}
	if(!(floor($r/pow(10,6)) ==102 || floor($r/pow(10,6)) ==101 || floor($r/pow(10,6)) ==103 || floor($r/pow(10,6)) ==106
	|| floor($r/pow(10,6)) ==107 || floor($r/pow(10,6)) ==108 || floor($r/pow(10,6)) ==110 || floor($r/pow(10,6)) ==111 || floor($r/pow(10,6))==112 || floor($r/pow(10,6)) ==114)){
		$message = "Incorrect Roll Number";
		echo "<script>alert('$message');</script>";
		return false;
	}
	return true;
}

//Get the roll number
$roll = $_GET["Roll"];
echo "Data entered is $roll<br/>";
if(validateInp($roll)){
	//Prepare the statement to prevent SQL injection
	$sql = $conn->prepare("SELECT Name,Roll,Dept,Email,Address,About FROM spider_2016_2 where Roll = ?");
	$sql->bind_param("i",$roll);   
	$sql->execute();
	
	$sql->bind_result($nam, $rol,$dep,$ema,$add,$abt);
	$sql->store_result();
	//echo "Number of rows afected is ".$sql->num_rows;
	if($sql->num_rows == 0){
		echo "0 results found!!";
	} else{
		echo "<table><tr><th>Name</th><th>Roll</th><th>Dept</th><th>Email</th><th>Address</th><th>About</th></tr>";
    /* fetch values */
		while ($sql->fetch()) {
			echo "<tr><td>".$nam."</td><td>".$rol."</td><td>".$dep."</td><td>".$ema."</td><td>".$add."</td><td>".$abt."</td></tr>";
		}
		echo "</table>";
		echo "<br/><br/>";
		//Set the Session variables with the names for editing purposes.
		$_SESSION["Roll"] = $rol;
		$_SESSION["Dept"] = $dep;
		echo "<a href='editData.php'><button id='editData'>Edit Details of this Student</button></a>";
		$conn->close();
	}
}
else{
	echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/viewData.html';</script>";
}

?>
</body>
</html>