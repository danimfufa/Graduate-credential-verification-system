<?php
include 'db.php';
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$message=$_POST['message'];

	$sql="INSERT INTO feedback(email,message) VALUES('$email','$message')";
	$query=mysqli_query($conn,$sql);
	if($query){
		echo "<script>alert('feadback sent successfully!');</script>";
	}else{
			echo "<script>alert('Failed to send feedback!');</script>";
	}
}



?>
<html>
<head>
<title> Home Page</title>
<style>
	  body{
    text-align: center;
      background-color: lavender;
  }

.container{
margin: 10px;
padding: 30px;
margin-left: 30%;
background-color: lavender;
width: 550px;
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
height: 280px;
width: 100%;
}
.input{
width: 100%;
height: 40px;
border: 0;
border-radius: 5px;
font-size: 14px;


}
#feedback{
	  font-size: 18px;
background-color: darkslateblue!important;
width: 200px!important;
color: white;
border: 0;
text-align: center;
border-radius: 5px;
height: 40px;

}
button{
background-color: darkslateblue;
width: 150px;
color: white;
border: 0;
text-align: center;
border-radius: 5px;
height: 40px;
}
button:hover{
color: white;
background-color: orangered;
cursor: pointer;
}
a{
	width: 150px;
color: darkslateblue;
text-decoration: none;

}
textarea{
	height: 100px;
	width: 100%;
		margin: 10px;
	padding: 10px;
}
.input{
	margin: 10px;
	padding: 10px;
}
</style>
</head>
<body >

<?php
include "index_header.php";
include 'db.php';
$sql="SELECT content FROM pages WHERE page_name='Contact Us'";
$query=mysqli_query($conn, $sql);
if($query){
	if(mysqli_num_rows($query)>0){
		while($row=mysqli_fetch_array($query)){?><br>
		<h1>Contact Us</h1><br>
		<p><?php  echo $row['content'] ?></p>

<?php
		}
	}
}

?>
<form  method="post">
<div class="container">
<!-- <img src="wu.jpg" width="100" height="100"> -->
<div class="subcontainer">
 <h3>Send your feadback:</h3><br>
<div>
<input type="email" name="email" class="input" placeholder="Email address" autocomplete="off" autofocus>
</div><br>

<div>
<textarea type="text" name="message" placeholder="Message" ></textarea>
</div><br>

<div>
<button type="submit" id="feadback" name="submit">Send feadback</button>
</div><br>
<div>
</div>
<br>

</div>
</div>
</form>
</body>
</html>
