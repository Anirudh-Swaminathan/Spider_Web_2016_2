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

$message = "Hello";

function validateInp($n,$r,$d,$e,$ad){
	
	global $message;
	
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
	//alert(''+Math.floor(r/Math.pow(10,6)));
	//Department Checking
	if(!(floor($r/pow(10,6)) ==102 && !strcmp($d,"Chemical")||floor($r/pow(10,6)) ==106 && !strcmp($d,"CSE")
		||floor($r/pow(10,6)) ==107 && !strcmp($d,"EEE")||floor($r/pow(10,6)) ==101 && !strcmp($d,"Architecture")
	||floor($r/pow(10,6)) ==103 && !strcmp($d,"Civil")||floor($r/pow(10,6)) ==108 && !strcmp($d,"ECE")
	||floor($r/pow(10,6)) ==110 && !strcmp($d,"ICE")||floor($r/pow(10,6)) ==111 && !strcmp($d,"Mechanical")
	||floor($r/pow(10,6)) ==112 && !strcmp($d,"MME")||floor($r/pow(10,6)) ==114 && !strcmp($d,"Production"))){
		//alert('Incorrect department for entered roll Number');
		$message = "Incorrect department for entered roll Number";
		echo "<script>alert('$message');</script>";
		return false;
	}
	if(strlen($e)!=18){
		//alert('Enter valid email. Should be \'your roll number\'@nitt.edu');
		$message = "Enter valid email. Should be \'your roll number\'@nitt.edu";
		echo "<script>alert('$message');</script>";
		return false;
	}
	else{
		$ro = substr($e,0,9);
		$en = substr($e,9,18);
		//alert('ro is '+ro+'\nen is '+en);
		if(strcmp($ro,$r)){			
			//alert("Valid Email is'your roll number'@nitt.edu");
			$message = "Valid Email is'your roll number'@nitt.edu";
			echo "<script>alert('$message');</script>";
			return false;
		}
		if(strcmp($en,"@nitt.edu")){
			//alert("Valid Email is 'your roll number'@nitt.edu");
			$message = "Valid Email is 'your roll number'@nitt.edu";
			echo "<script>alert('$message');</script>";
			return false;
		} 
	}
	if(!strcmp($ad,"")) {
		echo "<script>alert('Null address');</script>";
		return false;
	}
	//echo "<script>alert('Result ok');</script>";
	return true;
}

$name = $_POST["Name"];
$roll = $_POST["Roll"];
$dept = $_POST["dept"];
$email = $_POST["email"];
$address = $_POST["address"];
$about = $_POST["about"];
$pass = "Password";

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[rand(0, $max)];
    }
    return $str;
}
$pass = random_str(8);

if(validateInp($name,$roll,$dept,$email,$address)){
	//echo "Data entered is $name <br/>$roll<br/>$dept<br/>$email<br/>$address<br/>$about<br/>$pass";
	//echo "<script>alert('Inserting now');</script>";
	$mysql_qry = "insert into spider_2016_2(Roll,Name,Dept,Email,Address,About,Password) values('$roll','$name','$dept','$email','$address','$about','$pass')";
	if(mysqli_query($conn,$mysql_qry)){
		echo "<br/>New Record created succesfully";
		echo "<br/>Password is $pass";
		$message = "Your password is $pass";
		echo "<script>alert('$message');</script>";
		echo "<script>alert('Please remember your password is $pass');  window.location.href='/Spider_2016_2/';</script>";
	
	//$redirect_page = '/Spider_2016_2/';
	}
	else{
		echo "<br/>Couldn\'t create record.";
		$message = "Unsuccessful!!";
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/addData.html';</script>";
	//$redirect_page = '/Spider_2016_2/addData.html';
	
	}
}
else{
	echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_2/addData.html';</script>";
}
//header('Location: '.$redirect_page);
?>
</body>
</html>