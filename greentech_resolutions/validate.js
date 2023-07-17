/* Using Javascript to shift between both forms in the login.php file based on if the user clicks on the Login or Register button:  */
var x=document.getElementById("login");
var y=document.getElementById("register");
var z=document.getElementById("btn");

function login(){ /* If the user clicks on Login, shift the form into view and hide the other form: */
    x.style.left="50px";
    y.style.left ="450px";
    z.style.left = "0";
}

function register(){ /* If the user clicks on Register, shift the form into view and hide the other form: */
    x.style.left="-400px";
    y.style.left ="50px";
    z.style.left = "110px";
}       

//Validate the registration form before sending the details to the database:
function validate_registration(){

    if(document.register_form.full_name.value.trim() == ""){//If Full Name is empty:
        alert("Please enter your full name.");
        document.register_form.full_name.focus();
        return false;
    }
    if(document.register_form.email.value.trim() == ""){ //If Email Address is empty:
        alert("Please enter your email address.");
        document.register_form.email.focus();
        return false;
    }
    if(document.register_form.pass.value.trim() == ""){ //If Password empty:
        alert("Please enter your password.");
        document.register_form.pass.focus();
        return false;
    }
    if(document.register_form.confirm_pass.value.trim() == ""){ //If Confirm Password is empty:
        alert("Please confirm your password.");
        document.register_form.confirm_pass.focus();
        return false;
    }
    if(document.register_form.bot_id.value.trim() == ""){ //If BOT ID is empty:
        alert("Please enter your BOT ID number.");
        document.register_form.bot_id.focus();
        return false;
    }

    var agree_checkbox=document.getElementById("agree_checkbox"); /* Store the agree to the terms and conditions checkbox from the regisration form: */
    
    if (!agree_checkbox.checked){ /* If the box is left unchecked upon submission display an alert to the user: */
        alert("Please agree to the terms and conditions before registering.");
        return false; //Prevent the form from being submitted:
    }

    return true; //Alow the form to be submitted once the checkbox is checked:
}

//Validate the login form before sending the details to the database:
function validate_login(){
    if(document.login_form.email.value.trim() == ""){ //If Email Address is empty:
        alert("Please enter your email address.");
        document.login_form.email.focus();
        return false;
    }
    if(document.login_form.password.value.trim() == ""){ //If Password empty:
        alert("Please enter your password.");
        document.login_form.password.focus();
        return false;
    }
}

//Validate the contact us form before sending the details to the database:
function validate_contact_us(){
    if(document.contact_us.full_name.value.trim() == ""){ //If Full Name is empty:
        alert("Please enter your full name.");
        document.contact_us.full_name.focus();
        return false;
    }
    if(document.contact_us.email.value.trim() == ""){ //If Email Address is empty:
        alert("Please enter your email address.");
        document.contact_us.email.focus();
        return false;
    }
    if(document.contact_us.comments.value.trim() == ""){ //If Comments is empty:
        alert("Please enter any comments.");
        document.contact_us.comments.focus();
        return false;
    }
}