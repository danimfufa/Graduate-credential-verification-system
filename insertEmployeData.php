<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}else{
    include 'db.php';
?>
<html>
<head>
    <title>WU GCVS</title>
</head>
<body>
<?php
if(isset($_POST['gsub'])){
// Capture POST data
$gid = $_POST['Gid'];
$gfname = $_POST['Gfname'];
$gmname = $_POST['Gmname'];
$glname = $_POST['Glname'];
$yog = $_POST['Yog'];
$gqul = $_POST['Gqul'];
$mgender = $_POST['mgender'];
$gdep = $_POST['gdep'];

// Validate image upload
$image_size = getimagesize($_FILES['image']['tmp_name']);
if ($image_size === FALSE) {
    echo '<script type="text/javascript">alert("Please select a valid image!");window.location="employeform.php";</script>';
    exit();
} elseif ($_FILES['image']['size'] > 30000) {
    echo '<script type="text/javascript">alert("The image is too big!");window.location="employeform.php";</script>';
    exit();
} else {
    $gphoto = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_type = addslashes($_FILES['image']['type']);
}

// Database connection
include 'db.php';

// Query to insert data
$sql = "INSERT INTO employe 
    (ID, Frist_Name, Midle_Name, Last_Name, Year_of_Graduation, Qualification, Gender, Department, Photo, Photo_type) 
    VALUES 
    ('$gid', '$gfname', '$gmname', '$glname', '$yog', '$gqul', '$mgender', '$gdep', '$gphoto', '$image_type')";

// Execute query
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn));
}

// Success message
echo '<script type="text/javascript">alert("Employee Registered successfully!");window.location="employeform.php";</script>';

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
<?php  } } ?>