//Client side validation for getitng all students in a particular department
function btnClick(){
	//alert("Hi There. I am going to submit.");
	return validate();
}
function validate(){
	var d = document.getElementById("dept").value;
	//Check if the input department is validate
	if(!(d === 'Chemical'||d === 'CSE'||d === 'Architecture'||d === 'EEE'||d === 'Civil'
	||d === 'ECE'||d === 'Mechanical'||d === 'ICE'||d === 'MME'||d === 'Production')){
		alert('Incorrect department');
		return false;
	}
	return true;
}