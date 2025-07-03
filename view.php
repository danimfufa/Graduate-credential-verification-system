<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header("location: index.php");
}
else
{
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>Admin Page
</title>
<style>
    body{
        background-color:  dimgray;
    }
    .container{
margin: 10px;
padding: 30px;
margin-top: 3%;
margin-left: 33%;
background-color:   dimgray;
width: 500px;
height: 300px;
border: 0;
border-radius: 20px;

}
.subcontainer{
background-color:  lightgray;
padding: 30px;
margin: 10px;
border: 0;
border-radius: 20px;
height: 220px;
}
.input{
width: 100%;
height: 40px;
border: 0;
border-radius: 5px;
}
select{
width: 100%;
height: 40px;
border: 0;
border-radius: 5px;
}
button{
    color: white;
    background-color: darkslateblue;
width: 100%;
height: 40px;
border: 0;
border-radius: 5px;
font-size: 18px;
}
button:hover{
    background-color: orangered;
    color: white;
    font-size: 18px;
}
</style>
</head>
<body >

<?php
include "adminheader.php";
?>
<div id="leftsh">
<?php
include "adminleft.php";
?>
</div>
<div class="container">
<div class="subcontainer">
<form method="post" action="searchforreg.php">
<h3 align='center'>Type Your Parameter</h3><br>
<select name="cbosearch">
<option>Student_ID</option>
<option>First_Name</option>
<option>Middle_Name</option>
<option>Last_Name</option>
<option>Cumulative_GPA</option>
<option>Year_Of_Graduation</option>
</select><br><br>
<input type="text" name="search" class="input" placeholder= "Enter the value" /><br><br>
<button type="submit"  name="cmdsearch">Search</button>	
</form>
</div>
</div>

</body>
</html>
<?php
}
?>
