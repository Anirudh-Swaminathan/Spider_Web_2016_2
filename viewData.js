//Client side validation for getting the rolll number
function viewS(){
	return validate();
}
function validate(){
	//Get roll number value(r)
	var r = document.getElementById("Roll").value;
	//Check roll number for valid details.
	if(Math.floor(r/Math.pow(10,8)) != 1){
		alert('Incorrect Roll Number');
		return false;
	}
	if(!(Math.floor(r/Math.pow(10,6)) ===102 || Math.floor(r/Math.pow(10,6)) ===101 || Math.floor(r/Math.pow(10,6)) ===103 || Math.floor(r/Math.pow(10,6)) ===106
	|| Math.floor(r/Math.pow(10,6)) ===107 || Math.floor(r/Math.pow(10,6)) ===108 || Math.floor(r/Math.pow(10,6)) ===110 || Math.floor(r/Math.pow(10,6)) ===111 || Math.floor(r/Math.pow(10,6)) ===112 || Math.floor(r/Math.pow(10,6)) ===114)){
		alert('Incorrect Roll Number');
		return false;
	}
	return true;
}