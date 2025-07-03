<?php
            session_start();
           if(!isset($_SESSION['username']))
		   { 
		   header("location:index.php");
		   }
		   else
		   {
		   ?><html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>
Adminstrator page
</title>
</head>
<body id="contianer">
<div id="bod">
<?php
		include "adminheader.php";
		?>
						<div id="leftsh">
<?php
		include "adminleft.php";
		?>
		<div id="spaceesh">
<div id="aformsh">
<center><h3><p style="background-color:#666666">THE FOLLOWING ARE THE DETAILS OF REGISTERED CUSTOMER AS YOU SEARCHED</p></h3></center>
<form action="searchforgcvs.php" method="post">
<table border="4" bgcolor="#336600"height="10%" width="10%" class="table">
<tr class="tabl">
<th height="12%">ID</th>
<th height="12%" width="12%">FIRST NAME</th>
<th>LAST NAME</th>
<th>PASSWORD</th>
<th>CONFIRM PASSWORD</th>
<th>EMAIL</th>
<th>MOBILE</th>
<th>CITY</th>
<th>AMOUNT</th>
</tr>
<?php
		$cbo = $_POST['cbosearch'];
		$search = $_POST['search'];
		include('searchdbcon.php');
		if($cbo=="ID")
		{
			$result = mysqli_query($on, "SELECT * FROM user WHERE id like '".$search."%'");
	
			while($row1=mysqli_fetch_array($result))
			{
	?>
				<tr class="">
					<td class=""><?php echo $row1[0]; ?></td>
					<td><?php echo $row1[1]; ?></td>
                	<td><?php echo $row1[2]; ?></td>
                	<td><?php echo $row1[3]; ?></td>
                	<td><?php echo $row1[4]; ?></td>
                	<td><?php echo $row1[5]; ?></td>
                	<td><?php echo $row1[6]; ?></td>
                	<td><?php echo $row1[7]; ?></td>
					<td><?php echo $row1[8]; ?></td>
				
				</tr>
    <?php
			}
		}
	
		else if($cbo=="FirstName")
		{
			$result2 = mysqli_query($con, "SELECT * from user WHERE fname like '".$search."%'");
	
				while($row2=mysqli_fetch_array($result2))
				{
	?>
				<tr>
					<td><?php echo $row2[0]; ?></td>
					<td><?php echo $row2[1]; ?></td>
               	 	<td><?php echo $row2[2]; ?></td>
               	 	<td><?php echo $row2[3]; ?></td>
                	<td><?php echo $row2[4]; ?></td>
                	<td><?php echo $row2[5]; ?></td>
               	 	<td><?php echo $row2[6]; ?></td>
               	 	<td><?php echo $row2[7]; ?></td>
					<td><?php echo $row2[8]; ?></td>
				
				</tr>
     <?php
				}
			  
    	 }
	 	else if($cbo=="Email")
		{
       	 	$result3 = mysqli_query($con, "SELECT * FROM user WHERE email like '".$search."%'");
     
				while($row3=mysqli_fetch_array($result3))
				{
		?>
				<tr>
					<td><?php echo $row3[0]; ?></td>
					<td><?php echo $row3[1]; ?></td>
                	<td><?php echo $row3[2]; ?></td>
                	<td><?php echo $row3[3]; ?></td>
                	<td><?php echo $row3[4]; ?></td>
                	<td><?php echo $row3[5]; ?></td>
                	<td><?php echo $row3[6]; ?></td>
                	<td><?php echo $row3[7]; ?></td>
					<td><?php echo $row3[8]; ?></td>
				
				</tr>
     <?php
				}
		}
		else if($cbo=="City")
		{
			$result4 = mysqli_query($con, "SELECT * FROM user WHERE city like '".$search."%'");
			
				while($row4=mysqli_fetch_array($result4))
				{			
		?>
            	<tr>
					<td><?php echo $row4[0]; ?></td>
					<td><?php echo $row4[1]; ?></td>
                	<td><?php echo $row4[2]; ?></td>
                	<td><?php echo $row4[3]; ?></td>
                	<td><?php echo $row4[4]; ?></td>
                	<td><?php echo $row4[5]; ?></td>
                	<td><?php echo $row4[6]; ?></td>
                	<td><?php echo $row4[7]; ?></td>
					<td><?php echo $row4[8]; ?></td>

				</tr>
				<?php
				}
		}
		else if($cbo=="Phone")
		{
			$result5 = mysqli_query($con, "SELECT * FROM user WHERE phone like '".$search."%'");
			
				while($row5=mysqli_fetch_array($result5))
				{			
		?>
            	<tr>
					<td><?php echo $row5[0]; ?></td>
					<td><?php echo $row5[1]; ?></td>
                	<td><?php echo $row5[2]; ?></td>
                	<td><?php echo $row5[3]; ?></td>
                	<td><?php echo $row5[4]; ?></td>
                	<td><?php echo $row5[5]; ?></td>
                	<td><?php echo $row5[6]; ?></td>
                	<td><?php echo $row5[7]; ?></td>
					<td><?php echo $row5[8]; ?></td>

				</tr>
				<?php
				}
		}
		else if($cbo=="LastName")
		{
			$result6 = mysqli_query($con, "SELECT * FROM user WHERE lname like '".$search."%'");
			
				while($row6=mysqli_fetch_array($result6))
				{			
		?>
            	<tr>
					<td><?php echo $row6[0]; ?></td>
					<td><?php echo $row6[1]; ?></td>
                	<td><?php echo $row6[2]; ?></td>
                	<td><?php echo $row6[3]; ?></td>
                	<td><?php echo $row6[4]; ?></td>
                	<td><?php echo $row6[5]; ?></td>
                	<td><?php echo $row6[6]; ?></td>
                	<td><?php echo $row6[7]; ?></td>
					<td><?php echo $row6[8]; ?></td>

				</tr>
            
     <?php
				}
		}
		
		
	  ?>
 <?php /*?><?php 

 	include("conn.php");
   
	if(isset($_POST['search']))
	{
		$search=$_POST['search'];
		
	
$query1 =mysql_query("SELECT * from reg WHERE fname like '".$search."%'")or die(mysql_error());

while($row=mysql_fetch_array($query1)){
   ?>
 <tr>
 
 		 <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['fname'] ?></td>
         <td><?php echo $row['lname'] ?></td>
         <td><?php echo $row['pwd'] ?></td>
         <td><?php echo $row['cpwd'] ?></td>
         <td><?php echo $row['email'] ?></td>
         <td><?php echo $row['phone'] ?></td>
         <td><?php echo $row['city'] ?></td>
 
 </tr>
   <?php }}?><?php */?>
  
</table>
</div>
</form>
</div>
	</div>
<?php
		include "yfoot.php";
		?>
</div>

</body>
</html>
<?php
}
?>
