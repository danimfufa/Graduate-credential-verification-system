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
// Collecting form data
$gid = $_POST['Gid']; // Student ID
$gfname = $_POST['Gfname'];
$gmname = $_POST['Gmname'];
$glname = $_POST['Glname'];
$gpa = $_POST['Gpa'];
$yog = $_POST['Yog'];
$gqul = $_POST['Gqul'];
$mgender = $_POST['mgender'];
$gdep = $_POST['gdep'];

// Check if image is uploaded
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
$image_size = getimagesize($_FILES['image']['tmp_name']);

if ($image_size == FALSE) {
echo '<script type="text/javascript">alert("Please select a valid student image!");window.location=\'insertregister.php\';</script>';
exit();
} else {
// Check if image size is less than or equal to 500KB
if ($_FILES['image']['size'] <= 500000) { // Limit: 500KB
$gphoto = file_get_contents($_FILES['image']['tmp_name']);
$image_type = $_FILES['image']['type'];

//include db
include 'db.php';

// Check if the student ID already exists in the database
$sql_check = "SELECT ID FROM student WHERE ID = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, 's', $gid);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

if (mysqli_stmt_num_rows($stmt_check) > 0) {
echo '<script type="text/javascript">alert("Error: The student ID already exists!");window.location=\'insertregister.php\';</script>';
mysqli_stmt_close($stmt_check);
mysqli_close($conn);
exit();
} else {
// If ID doesn't exist, proceed with insertion
$sql = "INSERT INTO student (ID, Frist_Name, Midle_Name, Last_Name, Cumulative_Gpa, Year_of_Graduation, Qualification, Gender, Department, Photo, Photo_type) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
// Bind parameters
mysqli_stmt_bind_param($stmt, 'sssssssssss', $gid, $gfname, $gmname, $glname, $gpa, $yog, $gqul, $mgender, $gdep, $gphoto, $image_type);

// Send image as blob
mysqli_stmt_send_long_data($stmt, 9, $gphoto); // Index 9 is for Photo (binary data)

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
echo '<script type="text/javascript">alert("Student added successfully");window.location=\'insertregister.php\';</script>';
} else {
echo '<script type="text/javascript">alert("Error: ' . mysqli_stmt_error($stmt) . '");window.location=\'insertregister.php\';</script>';
}

// Close the prepared statement
mysqli_stmt_close($stmt);
} else {
echo '<script type="text/javascript">alert("Error: Could not prepare the SQL statement.");window.location=\'insertregister.php\';</script>';
}
}

// Close the database connection
mysqli_close($conn);
exit();
} else {
echo '<script type="text/javascript">alert("The image is too big! Please ensure it is 500KB or less.");window.location=\'insertregister.php\';</script>';
exit();
}
}
} else {
echo '<script type="text/javascript">alert("Please upload a student image!");window.location=\'insertregister.php\';</script>';
exit();
}
?>
</body>
</html>
<?php } ?>