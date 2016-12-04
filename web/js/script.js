
//to reset all input data
function reSet() 
{
    document.getElementById("frm").reset();
}

//Register Form Validation
function ValidateFormRegister()
{
		// checking if it is empty        
        var reemail;
        var firstname = document.getElementById("firstname").value;  
		var lastname = document.getElementById("lastname").value;  
        var email = document.getElementById("email").value;             
    	var password = document.getElementById("password").value;   
		var repassword = document.getElementById("repassword").value;  
        
		if( firstname == null || firstname == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>FirstName must be filled out.</font>";
			document.RegisterForm.firstname.focus();
			return false;
		}
		if( lastname == null || lastname == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>LastName must be filled out.</font>";
			document.RegisterForm.lastname.focus();
			return false;
		}
		if(email == null || email == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Email must be filled out.</font>";
			document.RegisterForm.email.focus();
			return false;
		}else{
           reemail = validateEmail(email);
           if(reemail==false)
           {
                document.getElementById("errmsg").innerHTML = "<font color='red'>Not a good email address.</font>";
                document.RegisterForm.email.focus();
                return false;
            }
        }
		if( password == null || password == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Password must be filled out.</font>";
			document.RegisterForm.password.focus();
			return false;
		}
		if( repassword == null || repassword == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Re-Enter Password.</font>";
			document.RegisterForm.repassword.focus();
			return false;
		}
		else
		{ 
			if( repassword !== password)
			{
				document.getElementById("errmsg").innerHTML = "<font color='red'>Both password don't match.</font>";
				document.RegisterForm.repassword.focus();
				return false;
			}
		}
		
}
//Login Form Validation
function ValidateFormLogin()
{
		// checking if it is empty        
        var reemail;       
        var email = document.getElementById("email").value;                  
        var password = document.getElementById("password").value;	
        if(email == null || email == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Email must be filled out.</font>";
			document.loginForm.email.focus();
			return false;
		}
		else
		{
           reemail = validateEmail(email);
           if(reemail==false)
           {
                document.getElementById("errmsg").innerHTML = "<font color='red'>Not a valid email address.</font>";
                document.loginForm.email.focus();
                return false;
            }
        }

	    if(password == null || password == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>password must be filled out.</font>";
			document.loginForm.password.focus();
			return false;
		}     
		
}
//Shopping Cart Form Validation
function ValidateForm()
{
		// checking if it is empty        
        var reemail, retel,repostal;
        var name = document.getElementById("name").value;        
        var phone = document.getElementById("phone").value;        
        var email = document.getElementById("email").value;             
    	var address = document.getElementById("address").value;        
        var postal = document.getElementById("postal").value;	
		if( name == null || name == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Name must be filled out.</font>";
			document.cartfrm.name.focus();
			return false;
		}
        if(phone == null || phone == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Phone number must be filled out.</font>";
			document.cartfrm.phone.focus();
			return false;
		}else        
		{
			retel = validateTel(phone);
			if(retel==false)
			{
                document.getElementById("errmsg").innerHTML = "<font color='red'>Phone number should be ddd-ddd-dddd.</font>";
				document.cartfrm.phone.focus();
				return false;
			}
		}       
		if(email == null || email == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Email must be filled out.</font>";
			document.cartfrm.email.focus();
			return false;
		}else{
           reemail = validateEmail(email);
           if(reemail==false)
           {
                document.getElementById("errmsg").innerHTML = "<font color='red'>Not a good email address.</font>";
                document.cartfrm.email.focus();
                return false;
            }
        }
		if(address == null || address == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Address must be filled out.</font>";
			document.cartfrm.address.focus();
			return false;
		}
		if(postal == null || postal == "")
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Postal code must be filled out.</font>";
			document.cartfrm.postal.focus();
			return false;
		}else{
            repostal = postalFilter(postal);
        }
        if(repostal==false)
		{
			document.getElementById("errmsg").innerHTML = "<font color='red'>Not a good Postal code.</font>";
			document.cartfrm.postal.focus();
			return false;
		}	
		
}
//canada postal code
function postalFilter(postalCode){
    postalCode = postalCode.toString().trim();
    var re = /^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$/i;
    return re.test(postalCode);
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
