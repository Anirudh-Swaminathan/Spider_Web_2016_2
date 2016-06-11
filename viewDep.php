<!DOCTYPE html>
<html>
	<head>
		<title>View All By Department</title>
	</head>
<body>
<?php
require "connect.php";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$message = "Hello";

function validateInp($d){
	global $message;
	if(strcmp($d,'Architecture')&&strcmp($d,'Chemical')&&strcmp($d,'CSE')&&strcmp($d,'EEE')&&strcmp($d,'ECE')&&
		strcmp($d,'Civil')&&strcmp($d,'Mechanical')&&strcmp($d,'MME')&&strcmp($d,'Production')&&strcmp($d,'ICE')){
		$message = 'Incorrect Department';
		return false;
	}
	return true;
}
$dept = $_GET["dept"];
//echo "Data entered is $roll<br/>";
if(validateInp($dept)){
	$sql = $conn->prepare("SELECT Name,Roll,Dept,Email,Address,About FROM spider_2016_2 where Dept = ? order by Roll ASC");
	$sql->bind_param("s",$dept);   
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
		$conn->close();
	}
}
else{
	echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/advTask.html';</script>";
}

?>
</body>
</html>