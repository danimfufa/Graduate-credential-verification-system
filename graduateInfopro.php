<html>
<head>
<title>WU GCVS</title>
</head>
<body>
<?php 
$gid = $_POST['Gid'];
$gfname = $_POST['Gfname'];
$gmname = $_POST['Gmname'];
$glname = $_POST['Glname'];
$gpa = $_POST['Gpa'];
$yog = $_POST['Yog'];
$gqul = $_POST['Gqul'];
$mgender = $_POST['mgender'];
$gdep = $_POST['gdep'];

// Check if an image was selected
$image_size = getimagesize($_FILES['image']['tmp_name']);
if ($image_size === FALSE) {
    echo '<script type="text/javascript">alert("Please select a student image!");window.location=\'InsertAndupdate.php\';</script>';
    exit();
} elseif ($_FILES['image']['size'] > 30000){
    echo '<script type="text/javascript">alert("The image is too big!");window.location=\'InsertAndupdate.php\';</script>';
        exit();
}else { 
    // Image size check
        // Get image content
    $gphoto = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_type = addslashes($_FILES['image']['type']);
}
        // Connect to the database using mysqli
        $con = mysqli_connect("localhost", "root", "", "gcvs_db_success");
        
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error($con));
        }

        //Move uploaded file to image directory
       if (move_uploaded_file($_FILES['image']['tmp_name'], "image/" . $_FILES['image']['name'])) {
            // Insert data into database
            $sql = "INSERT INTO student (ID, Frist_Name, Midle_Name, Last_Name, Cumulative_Gpa, Year_of_Graduation, Qualification, Gender, Department, Photo, Photo_type) 
                    VALUES ('$gid', '$gfname', '$gmname', '$glname', '$gpa', '$yog', '$gqul', '$mgender', '$gdep', '$gphoto', '$image_type')";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            }else{
            mysqli_close($con); // Close the database connection
            echo '<script type="text/javascript">alert("Student added successfully!");window.location=\'InsertAndupdate.php\';</script>';
            exit();
        }} //else{
           // echo '<script type="text/javascript">alert("Failed to upload image!");window.location=\'InsertAndupdate.php\';</script>';
           // exit();
   // }
?>
</body>
</html>
