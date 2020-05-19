
//get data
  function myvalidation(){
	    
	
   var name = document.getElementById("name").value;
	var subject = document.getElementById("subject").value;
	var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").value;
	var message = document.getElementById("message").value;
	var error_message = document.getElementById("error_message");
	var text;
	error_message.style.padding = "10px";

	//validates name input
	if(name.length<5){
	  text="Please Enter Your Full Name";
	  error_message.innerHTML = text;
	  return false;
	}
	//validates subject
	if (subject.length<5){
		text="Please enter correct subject";
		error_message.innerHTML = text;
	  return false;
	  }
	  //validates phone
	if (isNaN(phone)|| phone.length !=10){
		text= "Please enter the valid number";
		error_message.innerHTML = text;
	  return false;
	}
	//validates email
	if(email.indexOf("@")==-1 || email.length<6){
		text="Please enter the valid email";
		error_message.innerHTML = text;
		return false;
		}
		//validates message
	 if(message.length<=20){
	    text="Please enter the message more than 20 character";
	    error_message.innerHTML = text;
	  return false;
	 
	 }
	 alert("Form Submitted Suceesfully!")
	return true;

    
	}