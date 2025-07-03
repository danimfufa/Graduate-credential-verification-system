<?php
session_start();
if(!isset($_SESSION['username'])){
header('location: index.php');
}else{

include 'db.php';
?>
<html><head>
<link href="good.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
<style>
	body{
		background-color: lavender;
		background-image: url('iterfaceimage/regemp.jpg');
	}
    .employee_left{
        padding: 10px;
		margin: 10px;
		float: left;
		width: 430px;
		height: 800px;
		background-color: lightgray;
		border-radius: 5px;
    }
    .input, select{
        height: 40px;
		width: 95%;
		border-radius: 5px;
		margin: 10px;
	}
	textarea{
		width: 95%;
		border-radius: 5px;
	}
    .employee_left input{
		padding: 10px;
		margin: 10px;
		width: 95%;
		border-radius: 5px;
		
	}
	.employee_left label{
		padding: 10px;
		margin: 10px;

	}
    .employee_right{
		margin: 10px;
		padding: 10px;
		float: right;
		width: 700px;
		height: 800px;
		background-color: lavender;

	}

</style>
</head>
<body >
<?php
include "external_user_header.php";
?>
</div>                    
<div id="leftsh">
<?php
include "external_user_left.php";
?></div>


<div class="employee_left">
<h4>Register Employee Information:</h4><br>
<form action="insertEmployeData.php" method="post" enctype="multipart/form-data" name="forma">


<label for="gid">Graduate ID:</label><br>
<input type="text" name="Gid" class="input"  placeholder="Enter ID number" size="30" required><br>

<label for="fname">First Name:</label><br>
<input type="text" name="Gfname" class="input"  placeholder="Frist Name" size="30" required><br>
<label for="mname">Middle Name:</label><br>
<input type="text" name="Gmname" class="input" placeholder="Middle Name" size="30" required><br>
<label for="lname">Last Name:</label><br>
<input type="text" name="Glname" class="input" placeholder="Last Name" size="30" required><br>
<label for="gender">Gender:</label>
<select name="mgender">
	<option>--select one--</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
<label for="dep">Department:</label><br>
<select name="gdep"  required>
<option>--select one--</option>
<?php
include 'db.php';
$sql="SELECT DISTINCT Department FROM student ORDER BY Department ASC";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['Department']; ?>">
<?php  echo $row['Department']; ?>
</option>

<?php } ?>

</select><br>
<label for="Year">Year of Graduation:</label><br>
<select name="Yog"  required>
<option>--select one--</option>
<?php
include 'db.php';
$sql=" SELECT DISTINCT Year_of_Graduation FROM student ORDER BY Year_of_Graduation ASC";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($query)){
?>
<option value="<?php echo $row['Year_of_Graduation'];?>">
<?php echo $row['Year_of_Graduation'];?></option>";
<?php } ?>

</select><br>
<label for="qualification">Qualification:</label><br>
<select name="Gqul" required>
<option>--select one--</option>
<option>Bachelors Degree</option>
<option>Post Graduate</option>
</select><br>

<label for="photo">Photo:</label><br><input type="file" name="image" required><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" class="btn btn-primary" name="gsub" onClick="validationForm()">&nbsp;Register</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset" value="Reset" class="btn btn-primary">Reset</button>
</form>
</div>




<div class="employee_right">
<img src="iterfaceimage/regemployee.jpg" width="100%" height="100%">
</div>



<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function validationForm() {
var gfn=document.forma.Gfname.value
var id=document.forma.Gid.value
var gmn=document.forma.Gmname.value
var gln=document.forma.Glname.value
var yog=document.forma.Yog.value
var mgender=document.forma.mgender.value
var gqu=document.forma.Gqul.value
var gdp=document.forma.gdep.value
var gdpp=document.forma.image.value
if (gfn=="")
{
window.alert("Graduate first name can not left blank");
return false;
}
else if (isNaN(gfn)==false)
{
window.alert("Graduate first name can not be number");
return false;
}
else if (gmn=="")
{
window.alert("Graduate Midle name can not left blank");
return false;
}
else if (isNaN(gmn)==false)
{
window.alert("Graduate Midle name can not be number");
return false;
}
else if (gln=="")
{
window.alert("Graduate Last name can not left blank");
return false;
}
else if (isNaN(gln)==false)
{
window.alert("Graduate Last name can not be number");
return false;
}
else if (yog=="--select one--")
{
window.alert("select year of garduation");
return false;
}
else if (gqu=="--select one--")
{
window.alert("Select Graduate qualification");
return false;
}
else if (mgender=="--select one--")
{
window.alert("Select gender option");
return false;
}

else if (gdp=="--select one--")
{
window.alert("select Department");
return false;
}
else if (gdpp=="")
{
window.alert("select Upload image");
return false;
}
else if(id=="")
{
window.alert("ID can not left blank");
return false;
}
}
//>
</script>

</body>
</html>
<?php } ?>