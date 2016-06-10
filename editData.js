function btnClick(){
	//alert("Hi There. I am going to submit.");
	return validate();
}
function validate(){
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
	 if(p === ""){
		 alert('Password must not be null');
		 return false;
	 }
	return true;
	
}