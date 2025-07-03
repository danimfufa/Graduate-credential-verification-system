<?php
session_start();
include 'db.php';
if(isset($_POST['reset'])){

    $token = md5($_POST['token_value']);

            $selectToken = "SELECT token_value from user WHERE token_value='$token'";
            $tokenQuery = mysqli_query($conn, $selectToken);
            
            if(mysqli_num_rows($tokenQuery)>0){
                while($row=mysqli_fetch_array($tokenQuery)){
                    if($row['token_value']!==$token){
                        // echo "<script>alert('Incorrect security word!');</script>";
                        $message[]='Security word not found!';
                    }elseif($row['token_value']===$token){
                header('location: change_password.php');
            }else{
                // echo "<script>alert('Security word does not exist!');</script>";
                $message[]='Security word does not exist!';
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
<title>password reset page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
  body{
    font-size: 14px;
      background-color: lavender;
  }

.container{
margin: 10px;
padding: 30px;
margin-top: 3%;
margin-left: 33%;
background-color:  lavender;
width: 500px;
height: 430px;
border: 0;
border-radius: 20px;

}
.subcontainer{
background-color:  lightgray;
padding: 30px;
margin: 10px;
border: 0;
border-radius: 20px;
height: 330px;
width: 420px;

}
.subcontainer h3{
    text-align: center;
}
.input{
    margin: 10px;
    padding: 10px;
width: 98%;
height: 40px;
border: 0;
border-radius: 5px;


}
button{
  font-size: 14px;
background-color: darkslateblue;
width: 98%;
color: white;
border: 0;
text-align: center;
border-radius: 5px;
height: 40px;
margin: 10px;
padding: 10px;
}
button:hover{
color: white;
background-color: orangered;
cursor: pointer;
}
a{
color: blue;
text-decoration: none;
}
#login{
    float: right;
}
#back{
    float: left;
}
</style>
</head>
<body>
<form action="" method="post">
<div class="container">

<div class="subcontainer">
<h3>Reset Password</h3><br>
 <?php
      if(isset($message)){
         foreach($message as $message){
            echo "<div class='message'><p><font size='4' >".$message."</font></p></div>";
         }
      }
      ?>
<div>
    <label>Enter your security word:</label><br><br>
<input type="text" name="token_value" class="input" placeholder="E.g Your favorite food" autocomplete="off" autofocus>
</div><br>
<div>
<button type="submit" name="reset">Reset password</button>
</div><br>
<div>
    <font size="4" color='blue'>
<a id="login" href="login.php">Login</a>
<a id="back" href="login.php">Back</a></font>

</div>
</div>
</form>

</body>
</html>