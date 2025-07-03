<?php 
 session_start();
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  include 'db.php';

  if(isset($_POST['submit'])){
  $fullname = $_POST['Name'];
  $username = $_POST['username'];
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $email = $_POST['email'];
  $user_type = $_POST['User_type'];
  $token = md5($_POST['token']);
   

  $tokenCheck="SELECT * FROM `user` WHERE TOKEN_VALUE='$token'";
  $tokenQuery=mysqli_query($conn, $tokenCheck);
  $sql = "SELECT * FROM `user` WHERE username='".$username."' AND email='".$email."' ";
  $result = mysqli_query($conn, $sql);
  if($result){
    $row = mysqli_num_rows($result);
    if($row>0){
      // echo '<script>alert("Username or email already exist!");</script>';
      $message[]='Username or email already exist!';
    }elseif($pass!==$cpass){
      // echo "<script>alert('Password does not match!');</script>"; 
      $message[]='Password does not match!';  
      }elseif(mysqli_num_rows($tokenQuery)>0){
        // echo "<script>alert('Security word already used!');</script>"; 
        $message[]='Security word already used!';
      }
      elseif($pass===$cpass){
      $sql = "INSERT INTO `user` (Name,username, password, email,User_type, token_value) VALUES('$fullname', '$username', '$pass','$email','$user_type', '$token')";
    $result = mysqli_query($conn, $sql);
    if($result){
      
      $_SESSION['username']=$username;
      echo "<script>alert('Registration Successfully!');window.location='login.php';</script>";  
    }else{
      // echo "<script>alert('Registration failed!');</script>";
      $message[]='Registration failed!';
    }
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
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    body{
      background-color: lavender;
    }
    .container{
    margin: 10px;
    padding: 30px;
    margin-top: 3%;
    margin-left: 33%;
    background-color: lavender;
    width: 500px;
    height: 900px;
    border-radius: 20px;
    box-shadow: lightslategray;
    
    }
    .subcontainer{
      position: relative;
      background-color: lightgray;
      padding: 30px;
      margin: 10px;
      border-radius: 20px;
      height: 750px;
        }
        .subcontainer label, p {
          margin: 5px;
          padding: 5px;
        }
        .input, select{
          width: 100%;
          height: 40px;
          border-radius: 5px;
          margin: 5px;
          padding: 5px;
          font-size: 14px;
        }
        button{
          width: 100%;
          height: 40px;
          border: 0;
          border-radius: 5px;
          margin: 5px;
          padding: 5px;
          color: white;
          background-color: darkslateblue;
          font-size: 18px;
        }
        button:hover{
          color: white;
          background-color: orangered;
          cursor: pointer;
        }
        a{
          text-decoration: none;
          cursor: pointer;
        }
        #back{
          float: left;
        }

          #error{
            color:red;
            font-size: 14px;
          }
       
  </style>
   <!-- <script defer type="text/javascript" src="form_validation.js"></script> -->
</head>
<body>
  <form name="regform" id="register" method="post">
    <div class="container">
      <!-- <img src="wu.jpg" width="100" height="100"> -->
      <div class="subcontainer">
        <h3 align='center'><font color="black" size="4">Register </font></h3>
       <p id="error"></p>
        <?php
      if(isset($message)){
         foreach($message as $message){
            echo "<div class='message'>".$message."</div>";
         }
      }
      ?>
        <div class="form_control success">
        <input type="text" id="fullname" name="Name" class="input" placeholder="Enter full name" required>
        <h6><font color="red"></font></h6>
        </div>

      <div class="form_control">
          <input type="text" id="username" name="username" class="input" placeholder="Enter username" required>
        </div>

        <div class="form_control success">
          <input type="email" id="email" name="email" class="input" placeholder="Enter email address" ><br>
           <h6><font color="red"></font></h6>
        </div>

        <div class="form_control">
          <input type="password" id="password" name="password" class="input" placeholder="Enter password" minlength="4" required><br>
           <h6><font color="red"></font></h6>
        <div class="form_control">
          <input type="password" id="cpassword" name="cpassword" class="input" placeholder="Confirm password" minlength="4" required>
        </div>

        <div class="form_control">   
          <label>Select role:</label>
          <select id="role" name="User_type" required>
            <option value="External User">External User</option>
          </select>
     
        </div><br>
        <div class="form_control">
        <label>Enter your own security word:</label><br>
        <input type="text" 
       class="input" name="token" placeholder="E.g Your favorite food" required>
        </div><br>
        <div>
        <button type="submit" id="submit" name="submit" >Register</button>
        </div><br>
         <div>
          <p><font size="4">Already have an account?&nbsp;&nbsp;
          <a href="login.php">Login</a><br><br>
          <a id="back" href="index.php">Back</a></div></font>
      </div>
    </div>
  </form>
 
 <!-- <script type="text/javascript" src="form_validation.js"></script> -->
<script type="text/javascript" src="regFormValidation.js"></script>
</body>
</html>