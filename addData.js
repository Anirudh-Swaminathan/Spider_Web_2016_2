function btnClick(){
	//alert("Hi There. I am going to submit.");
	return validate();
}
function validate(){
	var r = document.getElementById("Roll").value;
	var d = document.getElementById("dept").value;
	var n = document.getElementById("Name").value;
	var m = document.getElementById("email").value;
	//var y = document.getElementById("year").value;
	//alert('Roll is '+r);
	//alert('1st digit is '+Math.floor(r/Math.pow(10,8)));
	//Roll Number Checking
	if(Math.floor(r/Math.pow(10,8)) != 1){
		alert('Incorrect Roll Number');
		return false;
	}
	if(!(Math.floor(r/Math.pow(10,6)) ===102 || Math.floor(r/Math.pow(10,6)) ===101 || Math.floor(r/Math.pow(10,6)) ===103 || Math.floor(r/Math.pow(10,6)) ===106
	|| Math.floor(r/Math.pow(10,6)) ===107 || Math.floor(r/Math.pow(10,6)) ===108 || Math.floor(r/Math.pow(10,6)) ===110 || Math.floor(r/Math.pow(10,6)) ===111 || Math.floor(r/Math.pow(10,6)) ===112 || Math.floor(r/Math.pow(10,6)) ===114)){
		alert('Incorrect Roll Number');
		return false;
	}
	//alert(''+Math.floor(r/Math.pow(10,6)));
	//Department Checking
	if(!(Math.floor(r/Math.pow(10,6)) ===102 && d === 'Chemical'||Math.floor(r/Math.pow(10,6)) ===106 && d === 'CSE'
		||Math.floor(r/Math.pow(10,6)) ===107 && d === 'EEE'||Math.floor(r/Math.pow(10,6)) ===101 && d === 'Architecture'
	||Math.floor(r/Math.pow(10,6)) ===103 && d === 'Civil'||Math.floor(r/Math.pow(10,6)) ===108 && d === 'ECE'
	||Math.floor(r/Math.pow(10,6)) ===110 && d === 'ICE'||Math.floor(r/Math.pow(10,6)) ===111 && d === 'Mechanical'
	||Math.floor(r/Math.pow(10,6)) ===112 && d === 'MME'||Math.floor(r/Math.pow(10,6)) ===114 && d === 'Production')){
		alert('Incorrect department for entered roll Number');
		return false;
	}
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
	//Check mail
	//alert('Mail is '+m);
	if(m.length!=18){
		alert('Enter valid email. Should be \'your roll number\'@nitt.edu');
		return false;
	}
	else{
		var ro = m.substring(0,9);
		var en = m.substring(9,18);
		//alert('ro is '+ro+'\nen is '+en);
		if(!(ro === r)){			
			alert("Valid Email is'your roll number'@nitt.edu");
			return false;
		}
		if(!(en === "@nitt.edu")){
			alert("Valid Email is 'your roll number'@nitt.edu");
			return false;
		} 
	}
	return true;
	
}