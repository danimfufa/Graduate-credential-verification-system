<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}else{
include 'db.php';

?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style>
	body{
		background-color: lavender;
	}
	.company_form{
		padding: 10px;
		margin: 10px;
		float: left;
		width: 430px;
		height: 800px;
		background-color: lightgray;
		border-radius: 5px;
	}
	.company_form input{
		padding: 10px;
		margin: 10px;
		width: 95%;
		border-radius: 5px;
		
	}
	.company_form label{
		padding: 10px;
		margin: 10px;
	}
	.input{
		width: 95%;
		border-radius: 5px;
		height: 40px;
	}
	textarea{
		padding: 10px;
		margin: 10px;
		width: 95%;
		border-radius: 5px;
	}
	.company_right{
		margin: 10px;
		padding: 10px;
		float: right;
		width: 700px;
		height: 800px;
		background-color: lavender;
	}
</style>
<link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet"/>
</head>
<body >
<?php
include "external_user_header.php";
?>
</div>                    
<div id="leftsh">
<?php
include "external_user_left.php";
?>
</div>

<div class="company_form">
<h4>Register Company Information:</h4><br>
<form name="forma" action="insertCompanyData.php" method="post" >

<label for="gid">Graduate ID:</label><br>
<input type="text" name="Gid"  class="input" placeholder="Enter Graduate ID" size="30" required><br>
<label for="phone">Company Phone:</label><br>
<input type="text" name="cphone" class="input" placeholder="Company Phone" size="30" required><br>
<label for="cname">Company Name:</label><br>
<input type="text" name="cname"  class="input" placeholder="Company Name" size="30"required><br>
<label for="cemail">Company Email:</label><br>
<input type="email" name="cemail"  class="input" placeholder="Company Email" size="30"required><br>
<label for="cregion">Company Region:</label><br>
<input type="text" name="ccountry"  class="input" placeholder="Enter Region" required><br>
<label for="ccity">Company city:</label><br>
<input type="text" name="ccity"  class="input" placeholder="Enter City" required><br>
<label for="date">Date</label><br>
<input type="date" name="date" class="input" class="date" placeholder="Date" size="30" required><br>
<label for="reasen">Reason:</label><br>
<textarea name="rov" rows="5" cols="21" required ></textarea><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button  type="submit" name="em" class="btn btn-primary" value="Register" onClick="validationForm()">Register</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button  type="reset" value="Clear" class="btn btn-primary" name="gsub">Clear</button>
</form>
</div>

<div class="company_right">
	<img src="iterfaceimage/regcompany.jpg" width="100%" height="100%">
</div>


<script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
<!--datepicker -->
<script type="text/javascript" charset="utf-8">
jQuery(function($){
$(".date").datepicker();
});
</script>
<script type="text/javascript">
<!--
function validationForm() {
var ph=document.forma.cphone.value
var id=document.forma.Gid.value
var cn=document.forma.cname.value
var ce=document.forma.cemail.value
var cc=document.forma.ccountry.value
var cci=document.forma.ccity.value
var da=document.forma.date.value
var ro=document.forma.rov.value
var atpos=ce.indexOf("@");
var dotpos=ce.lastIndexOf(".");
if(id=="")
{
window.alert("Graduate ID can not left blank");
return false;
}
else if (ph=="")
{
window.alert("Compay phone can not left blank");
return false;
}
else if (isNaN(ph))
{
window.alert("Company phone Must be number");
return false;
}
else if (cn=="")
{
window.alert("Company Name can not left blank");
return false;
}
else if (isNaN(cn)==false)
{
window.alert("Company Name can not be number");
return false;
}
else if (ce=="")
{
window.alert("Company Email can not left blank");
return false;
}
else if (atpos<1||dotpos<atpos+2||dotpos+2>=ce.length)
{
window.alert("Not a valid email address");
return false;
}
else if (cc=="--select one--")
{
window.alert("Select Company country");
return false;
}
else if (cci=="--select one--")
{
window.alert("select Company city");
return false;
}
else if (da=="")
{
window.alert("date can not left blank");
return false;
}
else if (ro=="")
{
window.alert("reason of verification can not left blank");
return false;
}
else 
{
window.alert("Company registered successfully!");
}
}
</script>

<script type="text/javascript">

<!--
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</body>
</html>
<?php  }  ?>