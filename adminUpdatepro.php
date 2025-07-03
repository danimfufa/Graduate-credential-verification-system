
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<style type="text/css">
	 .StudentInfo{
            float: left;
            margin: 10px;
            padding: 10px;
            width:80%;
            border-radius: 20px;
        }

        .StudentInfo table{
        	border-radius: 20px;
        	background-color: white;
        	width: 550px;
        	text-align: center;
        }
</style>
<title>
Administrator Page
</title>
</head>
<body >
<div>
<?php
	include "adminheader.php";
		?>
<div id="leftsh">
<?php
include "adminleft.php";
?>
</div>

<?php
include 'db.php';
$gid=$_GET['ID'];
$q = "select * from student where ID='$gid'";
$r=mysqli_query($conn, $q);
if(mysqli_num_rows($r)==0)
 {
 echo"No such record exists";
  exit();
 }
?>
<?php
for ($i = 0; $i < mysqli_num_rows($r); $i++)
{
$row= mysqli_fetch_row($r);
$Id=$row[0];
?>

<div class="studentInfo">
<h3>Update Graduated Student Information:</h3><br>
<form method="post"  enctype="multipart/form-data" action="AdminUpdatepro2.php?ID=<?php echo $Id;?>">
<table cellspacing="15" cellpadding="10" bgcolor="lightgrey" width="50%">
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student ID:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[0];?></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frist Name:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield1">
              <label><input type="text" name="Gfname" size="20" id="span9001" value="<?php echo $row[1];?>"><span class="textfieldRequiredMsg"><b>Frist Name required</b></span></span></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield2">
              <label><input type="text" name="Gmname" size="20" id="span9001" value="<?php echo $row[2];?>"><span class="textfieldRequiredMsg"><b>Middle Name required</b></span></span></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield3">
              <label><input type="text" name="Glname" size="20" id="span9001" value="<?php echo $row[3];?>"><span class="textfieldRequiredMsg"><b>Last Name required</b></span></span></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CGPA:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield4">
              <label><input type="text" name="Gpa" size="20" id="span9001" value="<?php echo $row[4];?>"><span class="textfieldRequiredMsg"><b>Cumulative GPA required</b></span></span></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="Yog" id="span9001">
<option><?php echo $row[5];?></option>
<?php
include 'db.php';
$sql=" SELECT DISTINCT Year_of_Graduation, Qualification, Gender, Department FROM student ORDER BY Year_of_Graduation, Qualification, Gender, Department ASC";
$query=mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
while($row=mysqli_fetch_assoc($query)){
?>
<option value="<?php echo $row['Year_of_Graduation'];?>">
<?php echo $row['Year_of_Graduation'];?></option>";
</select></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quaification:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="gqul" id="span9001">
<option value="<?php echo $row['Qualification'];?>"><?php echo $row['Qualification'];?></option>
<option>Bachelors Degree</option>
<option>Post Graduate</option>
</select></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="mgender" id="span9001">
<option value="<?php echo $row['Gender'];?>"><?php echo $row['Gender'];?></option>
<option>Male</option>
<option>Female</option>
</select></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Department:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="gdep" id="span9001">
<option value="<?php echo $row['Department'];?>"><?php echo $row['Department'];?></option>
</select></td></tr>
<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload Photo:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="image" ></td></tr>
<tr><td></td><td colspan="2"><button type="submit" name="browse" class="btn btn-primary" Value="Update">Update</button></td></tr>
</table>
</form>
</div>

 <?php
// Close the connection
mysqli_close($conn);
?>
<?php
}
?>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>

</body>
</html>
<?php
}
}}
?>