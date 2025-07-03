
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index Page</title>
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
      color: white;
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
    .input{
      width: 100%;
          height: 40px;
          border: 0;
          border-radius: 5px;
    }
    table{
      width: 100%;
      height: 100px;
      color: white;
      background-color: black;
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
			height: 70px;
			border: 0;
			font-size: 14px;
			font-weight: bold;
			font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    #centerDiv {
      background-image: url(iterfaceimage/index_bg.JPG);
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
  margin: 0;
  padding: 0;
 height: 100vh;
  width: 100vw;
  transition: background-image 0.5s ease-in-out;
} 
  </style>
</head>
<body>
  <nav>
  <?php
include 'index_header.php';
  ?>
  </nav>
  <main class="centerDic">
    <div id="centerDiv">

    </div>

  </main>
  
 <footer><?php require "yfoot.php"; ?></footer>
</body>
</html>