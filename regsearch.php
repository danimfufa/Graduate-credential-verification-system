<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>
Registerar page
</title>
</head>
<body id="contianer">
<div id="bod">
<?php
		include "registerarheader.php";
		?>
				<div id="left">
<?php
		include "registerarLeft.php";
		?>
		</div>
<div id="space">
<div id="aform">
<h3>Search Graduate Information Form:</h3>
<form action="regsearchpro.php" method="post">
<table cellspacing="20" cellpadding="10"><tr><td>
<tr><td>Graduate ID:</td><td><input type="text" name="Gid" class="user_name_hover" id="span9001" placeholder="Graduate ID" size="30" required="required"></td></tr>
<tr><td>Year of Graduation:</td><td><select name="Yog" id="span9001">
<option>2008</option>
<option>2009</option>
<option>2010</option>
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
<option>2021</option>
</select></td></tr>
<tr><td>Quaification:</td><td><select name="gqul"id="span9001">
<option>Bachelors Degree</option>
<option>Post Graduate</option>
</select></td></tr></table><br><br><br><br>
<button class="btn btn-primary" name="search">&nbsp;Search</button>
</div>
</form>
</div>
<?php
		include "yfoot.php";
		?>
</div>

</body>
