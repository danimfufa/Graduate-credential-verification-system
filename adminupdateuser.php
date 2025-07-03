<?php
session_start();
if (!isset($_SESSION['username'])) { 
    header("location:index.php");
} else {
?>
<html>
<head>
    <link href="good.css" rel="stylesheet" type="text/css" />
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
    <title>Admin page</title>
    <style type="text/css">
    tbody, form, form table, table{
        text-align: center;
    }
    form{
        margin: 10px;
        padding: 10px;
        margin-left: 50px;
        margin-top: 50px;
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
   
<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {

    include 'db.php';
    
$gid = $_POST['id'];
// Prepare the query to prevent SQL injection
$q = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($conn, $q);
mysqli_stmt_bind_param($stmt, "i", $gid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo "No such record exists";
    exit();
}

while ($row = mysqli_fetch_assoc($result)) {
    $Id = $row['id'];
?>
<form method="post" enctype="multipart/form-data" action="adminupdateuserpro.php?id=<?php echo $Id;?>">
    <h3>Update User Information</h3>

    <table cellspacing="15" cellpadding="10">
        <tr><td>Role:</td><td><?php echo $row['User_type'];?></td></tr>
        <tr><td>Full Name:</td><td><span id="sprytextfield1">
            <label><input type="text" name="Gfname" size="20" id="span9001" value="<?php echo $row['Name'];?>"></label>
            <span class="textfieldRequiredMsg"><b>fullame required</b></span></span></td></tr>
        <tr><td>User Name:</td><td><span id="sprytextfield2">
            <label><input type="text" name="Gmname" size="20" id="span9001" value="<?php echo $row['username'];?>"></label>
            <span class="textfieldRequiredMsg"><b>User Name required</b></span></span></td></tr>
        <tr><td>Password:</td><td><span id="sprytextfield3">
            <label><input type="text" name="Glname" size="20" id="span9001" value="<?php echo $row['password'];?>"></label>
            <span class="textfieldRequiredMsg"><b>Password required</b></span></span></td></tr>
        <tr><td>Email:</td><td><span id="sprytextfield4">
            <label><input type="email" name="Gpa" size="20" id="span9001" value="<?php echo $row['email'];?>"></label>
            <span class="textfieldRequiredMsg"><b>Email required</b></span></span></td></tr>
            <tr><td colspan="2"> <input type="submit" name="browse" class="btn btn-primary" Value="Update">
</td></tr>
    </table>
   </form>

<?php
}

// Close the prepared statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
?>

<script type="text/javascript">
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
    var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
    var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
</body>
</html>

<?php
}
?>
