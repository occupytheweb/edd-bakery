"use strict";

function chkFname(value){
    var regEx=/^[A-Za-z]{2,15}\s[A-Za-z]{2,15}$/;
    if(!regEx.test(value)){
        alert("Your Firstname is required");
        return false;
    }
    return true;
}
function chkLname(value){
    var regEx=/^[A-Za-z]{2,15}\s[A-Za-z]{2,15}$/;
    if(!regEx.test(value)){
        alert("Your Lastname is required");
        return false;
    }
    return true;
}


function chkEmail(value){
    var regEx=/^^[A-Za-z]+\.?.?[0-9]?[A-Za-z]+\@(hotmail|gmail|yahoo|umail\.uom\.ac)\.(mu|com|fr)$/;
    if(!regEx.test(value)){
        alert("Your Email Address is wrong");
        return false;
    }
    return true;
}
function ValidateAll(){
    if(!chkFname(document.getElementById("first_name").value)){
        return false;
    }
    if(!chkFname(document.getElementById("last_name").value)){
        return false;
    }

    if(!chkEmail(document.getElementById("email").value)){
        return false;
    }
    return true;
}

function checkPass()
{
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('cpassword');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "<img src='tick.jpg'></img>"
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "<img src='cross.jpg'></img>"
    }
}
