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
<style type="text/css">
	  .leftDiv{
    text-align: center;
        margin: 10px;
        padding: 10px;
        float: left;
        width: 500px;
        background-color:lavender;
        margin-left:200px;
        margin-top: 10px;
        border-radius: 20px;

    }
      .leftDiv input, select{
        width: 98%;
        padding: 8px;
        border-radius: 7px;
      }
      button{
        width: 100px;
        height: 30px;
        font-size: 14px;
        color: white;
        background-color: darkslateblue;
        border: 0;
        border-radius: 5px;
      }
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
<title>
Adminstrator page
</title>
<style type="text/css">
	table{
		text-align: center;
		margin: 10px;
		padding: 10px;

	}
	body{
		text-align: center;
	}
	form{
		text-align: center;
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

<div class="leftDiv">
<h3>Update User Account</h3>
<form action="createaccpro.php" method="post" name="forma">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table cellspacing="5" cellpadding="10" >
	<tr><th colspan="2" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fill Current Account Information:<br></th></tr>
<tr><td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Role:<br></td><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="selectop" id="span9001" required>
<option value="Administrator">Administrator</option>
<option value="Registrar">Registrar</option>
<option value="Finance Officer">Finance Officer</option>
</select></td></tr>
<tr><td colspan="2"></td></tr>
<tr><td colspan="2"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:<br></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield1">
<label><input type="text" name="uaccount" id="span9001" placeholder="Current Username" size="30" required></label><span class="textfieldRequiredMsg"><b>required</b></span></span></td></tr>
<tr><td colspan="2"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:<br></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield2">
<label><input type="password" name="pass" id="span9001" placeholder="Current Password" size="30" required></label><span class="textfieldRequiredMsg"><b>Current Password required</b></span></span></td></tr>
<tr><td colspan="2"></td></tr>
<tr><th colspan="2" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter New Account Information:<br></th></tr>
<tr><td colspan="2"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:<br></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield3">
<label><input type="text" name="nuaccount" id="span9001" placeholder="New username" size="30" required></label><span class="textfieldRequiredMsg"><b>Username is required</b></span></span></td></tr>
<tr><td colspan="2"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield4">
<label><input type="password" name="npass" id="span9001" placeholder="New password" size="30" required></label><span class="textfieldRequiredMsg"><b>New password is required</b></span></span></td></tr>
<tr><td colspan="2"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm Password:<br></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="sprytextfield5">
<label><input type="password" name="ncpass" id="span9001" placeholder="Confirm New Password" size="30" required></label><span class="textfieldRequiredMsg"><b>Confirm New Password is required</b></span></span></td></tr>
<tr><td colspan="2"></td></tr>
<tr><td></td><td colspan="2"><button class="btn btn-primary" name="sacc" onClick="validationForm()">&nbsp;Update</button>
</td></tr>
</table>
</form>
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

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function validationForm() {
var sop=document.forma.selectop.value
var ua=document.forma.uaccount.value
var pa=document.forma.pass.value
var nua=document.forma.nuaccount.value
var np=document.forma.npass.value
var ncp=document.forma.ncpass.value
if (sop=="--select one--")
{
window.alert("please select user account type");
return false;
}
else if (ua=="")
{
window.alert("please insert saved user name");
return false;
}
else if (isNaN(ua)==false)
{
window.alert("saved user name is not number");
return false;
}
else if (pa=="")
{
window.alert("please insert saved password ");
return false;
}
else if (nua=="")
{
window.alert("please insert new user name");
return false;
}
else if (isNaN(nua)==false)
{
window.alert("new user name is not number");
return false;
}
else if(np=="")
{
window.alert("please insert new password");
return false;
}
else if(ncp=="")
{
window.alert("please confirm new password");
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