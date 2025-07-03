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
      echo "<script>alert('User created successfully!!');</script>"; 
    }else{
      echo "<script>alert('Failed to create new user!');</script>";
    }
  }
}
}
}

include 'db.php';

// Handle Page Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["page_name"]) && isset($_POST["content"])) {
    $page_name = $_POST["page_name"];
    $content = $_POST["content"];

    // Check if page already exists
    $sql = "SELECT id FROM pages WHERE page_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $page_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Update existing page
        $sql_update = "UPDATE pages SET content = ? WHERE page_name = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ss", $content, $page_name);
        $stmt_update->execute();
        $stmt_update->close();
        echo "<script>alert('Page information updated successfully!');</script>";
    } else {
        // Insert new page
        $sql_insert = "INSERT INTO pages (page_name, content) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $page_name, $content);
        $stmt_insert->execute();
        $stmt_insert->close();
        echo "<script>alert('Page information added successfully!');</script>";
    
    }
    $stmt->close();
}

$conn->close();
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<title>
Adminstrator page
</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
  .leftDiv{
    text-align: center;
        margin: 10px;
        padding: 10px;
        float: left;
        width: 500px;
        background-color:lavender;
        margin-left:200px;
        margin-top: 10px;
        border-radius: 20px;

    }
      .leftDiv input, select{
        width: 98%;
        padding: 8px;
        border-radius: 7px;
      }
      button{
        width: 100px;
        height: 30px;
        font-size: 14px;
        color: white;
        background-color: darkslateblue;
        border: 0;
        border-radius: 5px;
      }
       button:hover{
        color: white;
        background-color: orangered;
        cursor: pointer;
       }
      #back{
        float: left;
      }
</style>
</head>
<body>
<?php
include "adminheader.php";
?>
<div id="leftsh">
<?php
include "adminleft.php";
?>
</div>


<div class="leftDiv">
<form action="" method="post">
    <div class="container">
      <!-- <img src="wu.jpg" width="100" height="100"> -->
      <div class="subcontainer">
        <h3><font color="black" size="4">Create New User Account</font></h3><br>
        
        <input type="text" name="Name" class="input" placeholder="Enter full name" required><br><br>
  
          <input type="text" name="username" class="input" placeholder="Enter username" required><br><br>
    
          <input type="email" name="email" class="input" placeholder="Enter email" required><br><br>

  
          <input type="password" name="password" class="input" placeholder="Enter password" required><br><br>


          <input type="password" name="cpassword" class="input" placeholder="Confirm password" required><br><br>

          <label>Select Role:</label><br><br>
          <select name="User_type" required>
            <option>Administrator</option>
            <option>Finance Officer</option>
            <option>Registrar</option>
          </select><br><br>

        <button type="submit" name="submit" >Create</button>
       <br><br>
       <a id="back" href="AdminPage.php">Back</a>
      </div>
    </div>
  </form>
</div>
</body>
</html>
























