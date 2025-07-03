
<html>
<head>
<title> Home Page</title>
<style>
	body{
		text-align: center;
		background-color: lavender;
	
	}
</style>
</head>
<body >

<?php
include "index_header.php";
include 'db.php';
$sql="SELECT content FROM pages WHERE page_name='Help'";
$query=mysqli_query($conn, $sql);
if($query){
	if(mysqli_num_rows($query)>0){
		while($row=mysqli_fetch_array($query)){?>
		<br>
		<h1>Help</h1><br>
		<p><?php  echo $row['content'] ?></p>

<?php
		}
	}
}

?>
</body>
</html>
