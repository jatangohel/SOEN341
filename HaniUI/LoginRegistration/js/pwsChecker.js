function pwsLengthChecker(){
	//length of the password
	pwsLength = document.getElementById("inputPws").value.length;
												
	if(pwsLength < 8){
		document.getElementById("register1").disabled = true;
		document.getElementById("pwsLengthErr").innerHTML = "Your password must be eight or more characters!";
		document.getElementById("pwsLengthErr").setAttribute("style", "color: red;");
	} else{ //an else clause must exist. Otherwise, a warnning message will always be displayed
		document.getElementById("register1").disabled = false;
		document.getElementById("pwsLengthErr").innerHTML = "";
	}
}
									