<?php 
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
    include 'db.php'; 
if(isset($_POST['save_change'])){
    $npwd = md5($_POST['npassword']);
    $cpwd = md5($_POST['cpassword']);
    $email=$_POST['email'];
$sql="SELECT email FROM user WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if($result){
 $row=mysqli_num_rows($result);
 if($row>0){

    if ($cpwd!==$npwd) {
      $message=['Password does not match!'];
    }elseif($npwd===$cpwd){
$update="UPDATE user SET password='$npwd' WHERE email='$email'";
    $result=mysqli_query($conn, $update);
    if($result){
        
        // echo "<script>alert('Password changed successfully!');</script>"; 
        $message[]='Password changed successfully!';
       header('location: login.php');
    }
     
 }
   }

    else{
        $message='Email does not exist!';
    }
  }
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>password Change page</title>
<style>
  body{
    font-size: 14px;
      background-color: lavender;
  }

.container{
margin: 10px;
padding: 10px;
margin-top: 3%;
margin-left: 33%;
background-color:   lavender;
width: 450px;
height: 500px;



}
.subcontainer{
background-color: lightgray;
padding: 10px;
margin: 10px;
border: 0;
border-radius: 20px;
height: 490px;
}
.subcontainer label{
    padding: 10px;
margin: 10px;
}
.input{
padding: 10px;
margin: 10px;
width: 88%;
border: 0;
border-radius: 5px;
font-size: 14px;


}
button{
padding: 10px;
margin: 10px;
font-size: 14px;
background-color: darkslateblue;
width: 93%;
color: white;
border: 0;
border-radius: 5px;
}
button:hover{
color: white;
background-color: orangered;
cursor: pointer;
}
a{
color: blue;
text-decoration: none;
margin-left: 5%;
}
#login{
    float: right;
    margin-right: 7%;
}

</style>
</head>
<body>
<form method="post">
<div class="container">
<div class="subcontainer">
<h3 align='center'><font color="black" size="5">Change Password</font></h3>
<div>
<input type="email" name="email" class="input" placeholder="Email address" autocomplete="off" autofocus required>
</div><br>


<div>
<input type="password" name="npassword" class="input" placeholder="New password" autocomplete="off" autofocus required>
</div><br>

<div>
<input type="password" name="cpassword" class="input" placeholder="Confirm new password" autocomplete="off" autofocus required>
</div><br>
<div>
<button type="submit" name="save_change">Save Change</button>
</div><br>
<div>

</div>
</div>
</form>

</body>
</html>
