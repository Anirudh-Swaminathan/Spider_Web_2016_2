<!DOCTYPE html>
<html>
<head>
	<title>Add Student Auth</title>
</head>
<body>
<?php
//Connect to th database
require "connect.php";
//Must resubmit form on reload
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//The error messages are set in this variable $message
$message = "Hello";

//A function to validate all the inputs
function validateInp($n,$r,$d,$e,$ad){
	
	//Accessing the $message variable declared outside the scope of this function.
	global $message;
	
	//Check name
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
	
	//Check roll number for valid details
	if(!(preg_match("/^[0-9]{9}$/",$r))){
		$message = "Invalid roll number";
		echo "<script>alert('$message');</script>";
		//^[0-9]{2}$
		//\d{9}
		return false;
	}

	if(floor($r/pow(10,8)) != 1){
		//alert('Incorrect Roll Number');
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
	
	//Department Checking
	if(!(floor($r/pow(10,6)) ==102 && !strcmp($d,"Chemical")||floor($r/pow(10,6)) ==106 && !strcmp($d,"CSE")
		||floor($r/pow(10,6)) ==107 && !strcmp($d,"EEE")||floor($r/pow(10,6)) ==101 && !strcmp($d,"Architecture")
	||floor($r/pow(10,6)) ==103 && !strcmp($d,"Civil")||floor($r/pow(10,6)) ==108 && !strcmp($d,"ECE")
	||floor($r/pow(10,6)) ==110 && !strcmp($d,"ICE")||floor($r/pow(10,6)) ==111 && !strcmp($d,"Mechanical")
	||floor($r/pow(10,6)) ==112 && !strcmp($d,"MME")||floor($r/pow(10,6)) ==114 && !strcmp($d,"Production"))){
		
		$message = "Incorrect department for entered roll Number";
		echo "<script>alert('$message');</script>";
		return false;
	}
	
	//Check if it is a valid email
	if(strlen($e)!=18){
		
		$message = "Enter valid email. Should be \'your roll number\'@nitt.edu";
		echo "<script>alert('$message');</script>";
		return false;
	}
	else{
		$ro = substr($e,0,9);
		$en = substr($e,9,18);
		
		if(strcmp($ro,$r)){			
			
			$message = "Valid Email is'your roll number'@nitt.edu";
			echo "<script>alert('$message');</script>";
			return false;
		}
		if(strcmp($en,"@nitt.edu")){
			
			$message = "Valid Email is 'your roll number'@nitt.edu";
			echo "<script>alert('$message');</script>";
			return false;
		} 
	}
	
	//Address musn't be null
	if(!strcmp($ad,"")) {
		echo "<script>alert('Null address');</script>";
		return false;
	}
	return true;
}

//Get all details
$name = $_POST["Name"];
$roll = $_POST["Roll"];
$dept = $_POST["dept"];
$email = $_POST["email"];
$address = $_POST["address"];
$about = $_POST["about"];
$pass = "Password";

//Function to generate a random password
function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[mt_rand(0, $max)];
    }
    return $str;
}
$pass = random_str(8);

if(validateInp($name,$roll,$dept,$email,$address)){
	$roll = (int) $roll;
	//Prepare statement to prevent SQL injection
	$mysql_qry = $conn->prepare("insert into spider_2016_2(Roll,Name,Dept,Email,Address,About,Password) values(?,?,?,?,?,?,?)");
	$mysql_qry->bind_param("issssss",$roll,$name,$dept,$email,$address,$about,$pass);
	$bo = $mysql_qry->execute();
	//$mysql_qry = "insert into spider_2016_2(Roll,Name,Dept,Email,Address,About,Password) values('$roll','$name','$dept','$email','$address','$about','$pass')";
	if($bo){
		echo "<br/>New Record created succesfully";
		echo "<br/>Password is $pass";
		$message = "Your password is $pass";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script type='text/javascript'>alert('Please remember your password is $pass');window.location.href='/Spider_2016_2/';</script>";
	}
	else{
		echo "<br/>Couldn\'t create record.";
		$message = "Unsuccessful!!";
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/addData.html';</script>";
	}
	$mysql_qry->close();
	$conn->close();
}
else{
	echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/addData.html';</script>";
}

?>
</body>
</html>