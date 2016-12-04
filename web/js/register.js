// JavaScript Document
/*
reference: w3schools.com
reference: http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
reference: http://regexlib.com/
reference: http://forums.phpfreaks.com/topic/260092-simple-phone-number/
*/
//to reset all input data
function reSet() 
{
    document.getElementById("frm").reset();
}

function ValidateFrom()
{

		// checking if it is empty
		var web="";
		var name = document.forms["frm"]["name"].value;
		var email = document.forms["frm"]["email"].value;
		var password = document.forms["frm"]["password"].value;
		var repassword = document.forms["frm"]["repassword"].value;
		var email = document.forms["frm"]["email"].value;
		web = document.forms["frm"]["web"].value;
		var phone = document.forms["frm"]["phone"].value;
		var reemail, retel, reweb;
		
		if( name == null || name == "")
		{
			alert("Name must be filled out");
			document.frm.name.focus();
			return false;
		}
		if(email == null || email == "")
		{
			alert("Email must be filled out");
			document.frm.email.focus();
			return false;			
		}
		reemail = validateEmail(email);
		if(reemail==false)
		{
			alert("Not a good email address");
			document.frm.email.focus();
			return false;	
		}
		
		
		if(password == null || password == "")
		{
			alert("Password must be filled out");
			document.frm.password.focus();
			return false;			
		}
		if(repassword == null || repassword == "")
		{
			alert("Password must be filled out");
			document.frm.repassword.focus();
			return false;			
		}
		if(password !== repassword)
		{
			alert("Password does not match");
			document.frm.password.focus();
			return false;	
		}
		if(phone !=null && phone !="")
		{
			retel = validateTel(phone);
			if(retel==false)
			{
				alert("Please check phone Number. \n Phone Number type: ddd-ddd-dddd");
				document.frm.phone.focus();
				return false;	
			}
		}

		if(web !=null && web !="")
		{
			
			reweb = validateWeb(web);		
				
			if(reweb==false)
			{
				alert("Please check URL.");
				document.frm.web.focus();
				return false;	
			}
		}
		alert("Your information successfully sent.");
}

//email validation
//x@y.z alphanumeric character
function validateEmail(email)
{
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1}\.[0-9]{1}\.[0-9]{1,3}\.[0-9]{1}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,99}))$/i;	
	return re.test(email);
	
}

//tel number ddd-ddd-ddd and d = number
function validateTel(tel)
{
	var re = /^(\d{3}-\d{3}-\d{4})*$/;
	return re.test(tel);
}

//website
//http://x.y.z alphanumeric character
function validateWeb(web)
{
	var re = /^(ht|f)tp(s?)\:\/\/[a-zA-Z0-9\-\._]+(\.[a-zA-Z0-9\-\._]+){2,}(\/?)([a-zA-Z0-9\-\.\?\,\'\/\\\+&amp;%\$#_]*)?$/i;
	return re.test(web);
	
}

