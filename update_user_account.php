<?php 
 session_start();
if($_SERVER['REQUEST_METHOD']=== 'POST'){
  include 'db.php';

  if(isset($_POST['submit'])){
  $fullname = $_POST['Name'];
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $email = $_POST['email'];
  $user_type = $_POST['User_type'];
   

  $sql = "SELECT * FROM `user` WHERE username='".$username."' AND email='".$email."' ";
  $result = mysqli_query($conn, $sql);
  if($result){
    $row = mysqli_num_rows($result);
    if($row>0){
      echo '<script>alert("Username or email already exist!");</script>';
    }elseif($pass!==$cpass){
      echo "<script>alert('Password does not match!');</script>";
      }elseif($pass===$cpass){
      $sql = "INSERT INTO `user` (Name,username, password, email,User_type) VALUES('$fullname', '$username', '$pass','$email','$user_type')";
    $result = mysqli_query($conn, $sql);
    if($result){
      
      $_SESSION['username']=$username;
      header('location: login.php');
     
      
    }else{
      echo "<script>alert('Registration failed!');</script>";
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
  <style>
    body{
      text-align: center;
      background-color: blueviolet;
    }
    .container{
    margin: 10px;
    padding: 30px;
    margin-top: 3%;
    margin-left: 30%;
    background-color: lightskyblue;
    width: 500px;
    height: 730px;
    border: 0;
    border-radius: 20px;
    box-shadow: lightslategray;
    
    }
    .subcontainer{
      background-color: lightgray;
      padding: 30px;
      margin: 10px;
      border: 0;
      border-radius: 20px;
        }
        .input, select{
          width: 100%;
          height: 40px;
          border: 0;
          border-radius: 5px;
          margin: 5px;
          padding: 5px;
        }
        button{
          width: 100%;
          height: 40px;
          border: 0;
          border-radius: 5px;
          margin: 5px;
          padding: 5px;
          color: white;
          background-color: blue;
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
        a:hover{
          color: white;
          background-color: orangered;
          cursor: pointer;
        }
  </style>
</head>
<body>
  <form action="" method="post">
    <div class="container">
      <img src="wu.jpg" width="100" height="100">
      <div class="subcontainer">
        <h3><font color="green" size="6">Update user account</font></h3>
        <div>
          <label>Select Account:</label><br>
          <select name="User_type">
            <option>Administrator</option>
            <option>Finance Officer</option>
            <option>Registrar</option>
          </select>
        </div><br>
        <div>
        <input type="text" name="cusername" class="input" placeholder="Current username">
        </div>

      <div>
        
          <input type="password" name="cpassword" class="input" placeholder="Current password">
        </div>

        <div>
          <input type="text" name="newusername" class="input" placeholder="New username">
        </div>

        <div>
          <input type="password" name="newpassword" class="input" placeholder="New password">
        </div>
        <div>
          <input type="password" name="cnewpassword" class="input" placeholder="Confirm new password">
        </div>
       
        <div>
        <button type="submit" name="submit" >Update</button>
        </div><br>

          <a href="AdminPage.php">Back to home</a>
        
      </div>
    </div>
  </form>
  
</body>
</html>