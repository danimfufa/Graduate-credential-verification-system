<?php

if($_SERVER['REQUEST_METHOD'] =='POST'){
include 'connection.php';
  if(!isset($_SESSION['username'])){
    session_start();
    header('location: login.php');
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
    *{
      margin: 0;
      padding: 0;
    }
    .headerbtn{
      width: 100px;
      height: 40px;
      color: white;
      background-color: black;
      border: 0;
      border-radius: 5px;
    }
    .headerbtn:hover{
      color: black;
      background-color: orangered;
      border: 0;
      border-radius: 5px;
      cursor: pointer;
    }
    button{
      color: white;
      background-color: blue;
      width: 100px;
      height: 40px;
      border: 0;
      border-radius: 7px;
      

    }
    button:hover{
          color: white;
          background-color: orangered;
          cursor: pointer;
        }
        #logout{
          float: right;

        }
   
    .logo{
      width: 100%;
      height: 150px;
      background-color: lightskyblue;
      border: 0;
    }
    .container{
      background-color: sandybrown;
      width: 100%;
      height: 500;
      margin: 5px;
      padding: 5px;
      border: 0;
      border-radius: 10px;


    }
    .subcontainer{
      background-color: lightgray;
      width: 100%;
      height: 200px;
      margin: 5px;
      padding: 5px;
      border: 0;
      border-radius: 10px;
    }
    .input{
      width: 100%;
          height: 40px;
          border: 0;
          border-radius: 5px;
    }
   
    a{
      color: orangered;
      text-decoration: none;
    }
    a:hover{
      color: black;
      background-color: white;
      width: 20px;
      height: 20px;
      border: 0;
      border-radius: 5px;
    }
    #tablelogo{
      border: 0;
      background-color: lightskyblue;
      color: brown;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-weight: bold;
      
    }
    #tablelogo h1{
      font-size: 70px;
    }
    #tablelogo h3{
     font-size: 38px;
    }
    #tableheader{
      border: 0;
      width: 100%;
      height: 100px;
      color: white;
      background-color: black;

    }
   
  </style>
</head>
<body>
  <div>
 
    <div class="logo">
      <table id="tablelogo">
        <tr>
          <td><img src="wu.jpg" width="150" height="140" alt="logo image"></td>
          <td><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WALLAGA UNIVERSITY</h1><br><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRADUATES CREDENTIAL VERIFICATION SYSTEM</h3></td>
          <td><td><img src="wu.jpg" width="150" height="140" alt="logo image"></td>
        </tr>
      </table>

    </div>
    <div class="header">
      <table id="tableheader">
        <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td><a href="home.php"><button class="headerbtn">Home</button></td>
          
        
        </tr>
      </table>

    </div>
  
  
  <div>
   <a href="logout.php"><button id="logout">Log Out</button></a>
  </div>
</body>
</html>