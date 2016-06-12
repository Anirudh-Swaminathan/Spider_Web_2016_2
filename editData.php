<?php
	session_start();
	//Get the session variables declared in viewStud.php
	//Make the user resubmit details on page reload.
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Student Details</title>
	</head>
	<body>
		<form action="editStud.php" method="POST">
			<header>Edit Student Details</header>
			<label>Name</label>
			<input required name="Name" pattern="[a-zA-Z][a-zA-Z ]+|[a-zA-Z]" title="Enter only alphabets and spaces" id="Name"/>
			<br/>
			<!--Pattern is [a-zA-Z ]*$ [a-zA-Z]+[a-zA-Z\s]+-->
			<label>Roll Number: <?php echo ''.$_SESSION["Roll"]; ?></label>
			<!--<input required name="Roll" maxlength="9" pattern="^[0-9]{9}$" title="Enter exactly 9 digits" id="Roll"/>-->
			<br/>
			
			<label>Department: <?php echo ''.$_SESSION["Dept"];?></label>
			<!--<input required name="dept" />-->
			<br/>
	
			<label>Email: <?php echo ''.$_SESSION["Roll"].'@nitt.edu' ?></label>
			<!--<input required name="email" maxlength="18" type="email" placeholder="Enter you web-mail" id="email"/>-->
			<br/>
			
			<label>Postal Address</label>
			<textarea required name="address" rows="5" cols="20"></textarea>
			<br/>
			
			<label>About me</label>
			<textarea name="about" rows="4" cols="30"></textarea>
			<br/>
			
			<label>Password</label>
			<input required name="Pass" id="Pass"/>
			<br/>
			
			<button id="register" onclick="return btnClick()">Edit Student Details</button>
			
		</form>
		
		<script type="text/javascript" src='editData.js' >
		</script>
	</body>
</html>