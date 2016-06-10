<!DOCTYPE html>
<html>
	<head>
		<title>View All Students</title>
	</head>
<body>
<?php
require "connect.php";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$message = "Hello";
$sql = $conn->prepare("SELECT Name,Roll,Dept,Email,Address,About FROM spider_2016_2");
//$sql->bind_param("i",$roll);   
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
	$conn->close();
}

?>
</body>
</html>