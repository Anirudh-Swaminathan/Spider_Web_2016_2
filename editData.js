//Client side validation for the data entered in editData.php
function btnClick(){
	return validate();
}
function validate(){
	//Get the name and password.
	var n = document.getElementById("Name").value;
	var p = document.getElementById("Pass").value;
	//Test name
	if (!(/[a-zA-Z]/.test(n))) {
		alert('No Letter Found in name');
		return false;
	}
	//else return false;
	if(/\d/.test(n)){
		alert('Name shouldn\'t contain any number');  
		return false;
	 } 
	 //Password musn't be null
	 if(p === ""){
		 alert('Password must not be null');
		 return false;
	 }
	return true;
	
}