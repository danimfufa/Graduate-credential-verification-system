<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header("location:index.php");
}
else
{
	include 'db.php';
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
<title>
Registerar page
</title>
<style>
	body{
		background-color: lavender;
	}
	.addstudent_form{
		padding: 10px;
		margin: 10px;
		float: left;
		width: 430px;
		height: 950px;
		background-color: lightgray;
		border-radius: 5px;
	}
	.addstudent_form input{
		padding: 10px;
		margin: 10px;
		width: 95%;
		border-radius: 5px;
		
	}
	.addstudent_form label{
		padding: 10px;
		margin: 10px;
	}
	.input, select{
		margin: 10px;
		padding: 10px;
		width: 95%;
		border-radius: 5px;
		height: 40px;
	}
	.addstudent_right{
		margin: 10px;
		padding: 10px;
		float: right;
		width: 630px;
		height: 950px;
		background-color: pink;
	}
	button{
		padding: 10px;
		margin: 10px;
		align-items: center;
		margin-left: 20%;
		background-color: darkslateblue;
	}
</style>
</head>
<body>

<?php
include "registerarheader.php";
?>
<div id="leftsh">
<?php
include "registerarLeft.php";
?>
</div>

<div class="addstudent_form">
<h4>Add Student Information:</h4><br>
<form action="reginsertgraduateinfo.php" name="forma" method="post" enctype="multipart/form-data" >

<label for="gid">Graduate ID:</label><br>
<input type="text" name="Gid" class="input" placeholder="Graduate ID" size="30" required><br>
<label for="fname">First Name:</label><br>
<input type="text" name="Gfname" class="input" placeholder="Enter First Name" size="30" required><br>
<label for="mname">Middle Name:</label><br>
<input type="text" name="Gmname" class="input" placeholder="Enter Middle Name" size="30" required ><br>
<label for="lname">Last Name:</label><br>
<input type="text" name="Glname" class="input"  placeholder="Enter Last Name" size="30" required><br>
<label for="year">Year of Graduation:</label><br>
<input type="text" name="Yog" class="input"  placeholder="Enter year of graduation" required><br>
<label for="qualification">Qualification:</label><br>
<select name="Gqul" class="input"  required>
<option>--select one--</option>
<option>Bachelors Degree</option>
<option>Post Graduate</option>
</select><br>
<label for="gender">Gender:</label><br>
<select name="mgender" class="input" required>
	<option>--select one--</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select><br>
<label for="Department">Department:</label><br>
<input type="text" name="gdep"  placeholder="Enter Department" required><br>
<label for="photo">Photo:</label><br>
<input type="file" name="image"  required><br>
<label for="gpa">CGPA:</label><br>
<input type="text" name="Gpa" placeholder="Enter cumulative GPA" size="30" required><br><br>
<button class="btn btn-primary" name="submitb" onClick="validationForm()"><i class="icon-ok-sign icon-large"></i>Register</button>
&nbsp;&nbsp;
<button type="reset" value="Clear" class="btn btn-primary">Reset</button><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<button type="button" value="Import From Excel" ONCLICK="window.location.href='excel/index.php'" class="btn btn-primary">Import From Excel</button>

</form>
</div>

<div class="addstudent_right">
	<img src="iterfaceimage/registrar.jpg" width="100%" height="100%">
</div>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
//-->
</script>
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
var gdppr=document.forma.Gpa.value
if(id=="")
{
window.alert("ID can not left blank");
return false;
}
else if (gfn=="")
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
window.alert("Graduate Middle name can not be number");
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

else if(gdppr=="")
{
window.alert("Cumulative GPA can not left blank");
return false;
}
}
//>
</script>

</body>
</html>
<?php
}
?>