<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css"/>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
function validationForm() {
var id = document.forma.Gid.value;
if (id == "") {
alert("Please enter student ID");
return false;
}
}
</script>
<style type="text/css">
	#right_response{
		float: left;
	}

	#left_response{
		text-align: center;
		margin: 10px;
		padding: 10px;
		float: left;
		width: 400px;
		height: 300px;
		font-size: 14px;
		background-color: lightgray;
		border: 0;
		border-radius: 10px;

	}
	.input{
		padding: 8px;
		font-size: 12px;
		width: 370px;
		border: 0;
		border-radius: 5px;
	}
	
	#response_table{
		align-items: center;
		border: 3px solid black;
		padding: 10px;
		margin: 10px;
		width: 570px;
		height: 400px;
		background-color: white;
	}
	button{
		background-color: darkslateblue;
		font-size: 14px;

	}
	body{
		background-color: dimgray;
	}
</style>
</head>
<body>

<?php include "external_user_header.php"; ?>

<div id="leftsh">
<?php include "external_user_left.php"; ?>
</div>

<div id="right_response">
	
<?php
include 'db.php';
if (isset($_POST['gsub'])) {
$gid = $_POST['Gid'];
if (empty($gid)) {
echo "<script>alert('Please enter graduate ID to verify!');</script>";
} else{
$checkId="SELECT ID FROM report WHERE ID='$gid'";
$query=mysqli_query($conn, $checkId);
if($query){
if(mysqli_num_rows($query)>0){
// Query to check graduate information
$query_graduate = "SELECT * FROM student WHERE ID = ?";
$stmt = $conn->prepare($query_graduate);
$stmt->bind_param("s", $gid);
$stmt->execute();
$result_graduate = $stmt->get_result();

if ($result_graduate->num_rows > 0) {
while ($row = $result_graduate->fetch_assoc()) {
echo "<div class='response'>";
echo "<table  id='response_table'>
<tr><td colspan='2'><h1 align='center'><img src='wulogo.png' width='100' height='100'></h1></td></tr>
<tr><td colspan='2'><p align='center'><font size='6' color='black'><strong>CONGRATULATION!</strong>
</font><font size='6' color='black'><br>Graduate is Verified!</font></p><br><br></td></tr>
<tr>
<td><img src='data:" . $row['Photo_type'] . ";base64," . base64_encode($row['Photo']) . "' width='150' height='155'/></td>
<td><b><p> <font size='5'>".$row['Frist_Name']." ".$row['Midle_Name']." ".$row['Last_Name']." "." </b>has been verified that
he/she has been graduated from <b>Wallaga University</b> by<b> ".$row['Qualification']." "."</b>in<b> ". $row['Department']." </b> with CGPA ".$row['Cumulative_Gpa']." in ".$row['Year_of_Graduation'].". </font></p></td>
</tr>
<tr>
<td colspan='2'><h3><font size='5' color='black'><strong>Graduate Details:</strong></font></h3><br>
<p><font size='5'><strong>Inistitution:</strong> Wallaga University</font></p>
<p><font size='5'><strong>ID:</strong> " . $row['ID'] . "</font></p>
<p><font size='5'><strong>First Name:</strong> " . $row['Frist_Name'] ."</font></p>
<p><font size='5'><strong>Middle Name:</strong> " . $row['Midle_Name'] . "</font></p>
<p><font size='5'><strong>Last Name:</strong> " . $row['Last_Name'] . "</font></p>
<p><font size='5'><strong>Gender:</strong> " . $row['Gender'] . "</font></p>
<p><font size='5'><strong>Department:</strong> " . $row['Department'] . "</font></p>
<p><font size='5'><strong>Qualification:</strong> " . $row['Qualification'] . "</font></p>
<p><font size='5'><strong>Years of Graduation:</strong> " . ($row['Year_of_Graduation'] ?? 'N/A') . "</font></p>
<p><font size='5'><strong>GPA:</strong> " . $row['Cumulative_Gpa'] . "</font></p>
</tr>
<tr><td colspan='2'><p align='right'><button style='color: white; background-color: black;' onclick='window.print()'>Print</button></p></td><tr>
";
   }
  }
 }
}else{
	// $sql="SELECT ID FROM employe WHERE ID='$gid'";
	// $result=mysqli_query($conn, $sql);
	// if(mysqli_num_rows($result)>0){
	// 	echo "<script>alert('Wait until the report is generated!');</script>";
	// }else{
	// 	echo "<script>alert('ID not found!');</script>";
	// }
// Query to check if the student is an undergraduate
$query_undergraduate = "SELECT * FROM request_approval WHERE Employe_ID = ?";
$stmt = $conn->prepare($query_undergraduate);
$stmt->bind_param("s", $gid);
$stmt->execute();
$result_undergraduate = $stmt->get_result();

if ($result_undergraduate->num_rows > 0) {
echo "<script>alert('Wait until the report is generated!');</script>";
} else {
echo "<script>alert('No student found with the given ID from Wallaga University!');</script>";
}
}
}
}
?>
</div>

<div id="left_response">
<p><strong><font size="6" color="black"><i>VIEW RESPONSE!</font></strong>
</p>

<form method="post" name="forma" onsubmit="return validationForm()"><br><br>
<input type="text" class="input" name="Gid" placeholder="Enter Graduate ID" size="30" required><br><br><br><br>

<button class="btn btn-primary" name="gsub">Verify</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset" class="btn btn-primary">Clear</button>
</form>
</i></font></strong></p></div>


<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
</body>
</html>
