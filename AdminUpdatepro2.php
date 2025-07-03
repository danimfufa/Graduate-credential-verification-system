<?php
// AdminUpdatepro2.php

// Start session if you use sessions for messages
// session_start();

// Include database connection
include 'db.php'; // Ensure db.php establishes $conn (e.g., $conn = mysqli_connect(...);)

// Function to safely get a POST variable
function getPostVar($name) {
    return isset($_POST[$name]) ? $_POST[$name] : '';
}

// Get the student ID from GET
$gid = isset($_GET['ID']) ? $_GET['ID'] : null;

// Redirect if ID is not provided (basic validation)
if (empty($gid)) {
    echo '<script type="text/javascript">alert("Student ID not provided for update!");window.location=\'adminUpdate.php\';</script>';
    exit();
}

// Get other form data
$gfname = getPostVar('Gfname');
$gmname = getPostVar('Gmname');
$glname = getPostVar('Glname');
$yog = getPostVar('Yog');
$gqul = getPostVar('gqul');
$mgender = getPostVar('mgender');
$gdep = getPostVar('gdep');

// Initialize image variables
$gphoto = null; // Will store binary image data if a new image is uploaded
$image_type = null;

// Flag to check if a new image was uploaded and is valid
$new_image_uploaded = false;

// Check if a file was uploaded and there are no errors
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_size_bytes = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];

    // Validate image size (e.g., max 1MB = 1048576 bytes)
    // Adjust 40000 to a more reasonable size like 1MB or 2MB
    $max_image_size = 1048576; // 1MB

    if ($image_size_bytes > $max_image_size) {
        echo '<script type="text/javascript">alert("The Student image is too big to upload! Max size: ' . ($max_image_size / 1024 / 1024) . 'MB");window.location=\'adminUpdate.php\';</script>';
        exit();
    }

    // Attempt to get image dimensions to confirm it's an image
    // THIS IS THE CRITICAL FIX FOR THE ValueError
    $imageInfo = @getimagesize($tmp_name); // Use @ to suppress warnings for non-image files initially

    if ($imageInfo === FALSE) {
        echo '<script type="text/javascript">alert("Uploaded file is not a valid image or is corrupted!");window.location=\'adminUpdate.php\';</script>';
        exit();
    }

    // Valid image, proceed to read content and set flag
    $gphoto = file_get_contents($tmp_name); // Read binary image data
    $image_type = $file_type;
    $new_image_uploaded = true;

    // It's generally better to move the file to a permanent location
    // and store its path in the database, instead of storing binary data.
    // However, sticking to your current approach of storing binary data for now.
    // If you decide to store as a file, you'd do:
    // $target_dir = "image/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // if (move_uploaded_file($tmp_name, $target_file)) {
    //     $gphoto = $target_file; // Store path
    //     $image_type = $_FILES['image']['type'];
    // } else {
    //     echo '<script type="text/javascript">alert("Error moving uploaded file.");window.location=\'adminUpdate.php\';</script>';
    //     exit();
    // }
}

// Prepare the SQL query based on whether a new image was uploaded
if ($new_image_uploaded) {
    // Update with new photo
    $sql = "UPDATE student SET Frist_Name=?, Midle_Name=?, Last_Name=?, Year_of_Graduation=?, Qualification=?, Gender=?, Department=?, Photo=?, Photo_type=? WHERE ID=?";
} else {
    // Update without changing photo (if no new photo was uploaded)
    $sql = "UPDATE student SET Frist_Name=?, Midle_Name=?, Last_Name=?, Year_of_Graduation=?, Qualification=?, Gender=?, Department=? WHERE ID=?";
}

// Use prepared statements to prevent SQL injection
if ($stmt = mysqli_prepare($conn, $sql)) {
    if ($new_image_uploaded) {
        mysqli_stmt_bind_param($stmt, "sssssssssb", $gfname, $gmname, $glname, $yog, $gqul, $mgender, $gdep, $gphoto, $image_type, $gid);
        // "s" for string, "b" for blob (binary data)
        mysqli_stmt_send_long_data($stmt, 7, $gphoto); // 7 is the index of the Photo column (0-indexed)
    } else {
        mysqli_stmt_bind_param($stmt, "sssssssi", $gfname, $gmname, $glname, $yog, $gqul, $mgender, $gdep, $gid);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo '<script type="text/javascript">alert("Student Updated Successfully!");window.location=\'adminUpdate.php\';</script>';
    } else {
        // Log the error for debugging, don't show to user directly
        error_log("Database error during student update: " . mysqli_error($conn));
        echo '<script type="text/javascript">alert("Error updating student. Please try again.");window.location=\'adminUpdate.php\';</script>';
    }

    mysqli_stmt_close($stmt);
} else {
    // Handle prepare statement error
    error_log("Failed to prepare statement for student update: " . mysqli_error($conn));
    echo '<script type="text/javascript">alert("An internal error occurred. Please try again later.");window.location=\'adminUpdate.php\';</script>';
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>