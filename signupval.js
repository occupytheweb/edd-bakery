"use strict";

function chkFname(value){
    var regEx=/^[a-zàâçéèêëîïôûùüÿñæœ ,.'-]+$/i;
    if(!regEx.test(value)){
        alert("Please enter your first name");
        return false;
    }
    return true;
}
function chkLname(value){
    var regEx= /^[a-zàâçéèêëîïôûùüÿñæœ ,.'-]+$/i;
    if(!regEx.test(value)){
        alert("Please enter your last name");
        return false;
    }
    return true;
}
function chkUname(value){
var regEx=/^.{4,15}$/;
    if(!regEx.test(value)){
        alert("Your username must be between 4 and 15 characters");
        return false;
    }
    return true;
}
function chkEmail(value){
    var regEx=/^\w+@\w+\.\w+$/;
    if(!regEx.test(value)){
        alert("Please check your email format");
        return false;
    }
    return true;
}
function ValidateAll(){
    if(!chkFname(dom.id_get("first_name").value)){
        return false;
    }
    if(!chkLname(dom.id_get("last_name").value)){
        return false;
    }
    if(!chkUname(dom.id_get("user_name").value)){
        return false;
    }
    if(!checkPass()){
        return false;
    }
    if(!chkEmail(dom.id_get("email").value)){
        return false;
    }

    styles.remove_class(dom.id_get('register-container'), "active");
    return true;
}

function checkPass()
{
    var pass1 = dom.id_get('password');
    var pass2 = dom.id_get('cpassword');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        return true;
    }else{
        pass2.style.backgroundColor = badColor;
        return false;
    }
}
