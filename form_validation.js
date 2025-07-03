
function validateForm(){
const registrationForm=document.getElementById('register');
const fullname=document.getElementById('fullname');
const username=document.getElementById('username');
const email=document.getElementById('email');
const pwd=document.regform.password.value;
const password=document.getElementById('password');
const errorMsg=document.getElementById('error'); 

if (fullname.value.trim()==="" || fullname.value.trim()==null) {
    alert("Full name required!");
      return false;
}else if(username.value.trim()===""||username.value.trim()==null){
    alert('Username required!');
      return false;
}else if(email.value.trim()===""||email.value.trim()==null){
    alert('Email required!');
    return false;
}else if(password.value.length<4){
   alert('Password must be at least 4 characters!');
    return false;
}else{
    true;
}
}


