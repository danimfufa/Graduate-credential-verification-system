<?php
// Check if 'Gid' is set in the POST request
if (!isset($_POST['Gid'])) {
    echo "<script>alert('No graduate ID selected!');</script>";

}

$cem = $_POST['Gid'];

// Create a connection to the database using mysqli
include 'db.php';
// Query to select the student information based on the Graduate ID
$q = "SELECT * FROM student WHERE ID='$cem'";
$r = mysqli_query($conn, $q);

// Check if the record exists
if (mysqli_num_rows($r) == 0) {
    echo "No such record exists";
    exit();
}

// Fetch the student record and insert it into the report table
while ($row = mysqli_fetch_array($r)) {
    $a = $row['ID'];
    $b = $row['Frist_Name'];
    $c = $row['Midle_Name'];
    $d = $row['Last_Name'];
    $e = $row['Cumulative_Gpa'];
    $f = $row['Year_of_Graduation'];
    $g = $row['Qualification'];
    $h = $row['Gender'];
    $i = $row['Department'];

    // Insert the fetched student information into the report table
    $sql = "INSERT INTO report (ID, Frist_Name, Midle_Name, Last_Name, Cumulative_Gpa, Year_of_Graduation, Qualification, Gender, Department) 
            VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i')";

    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    }
}

// Success message and redirect
echo '<script type="text/javascript">alert("Report Generated successfully");window.location=\'sendmessearch.php\';</script>';

// Close the database connection
mysqli_close($conn);
?>
