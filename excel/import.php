<?php
include 'db.php'; // Assuming db.php contains mysqli connection setup

if(isset($_POST["Import"])){
    // Check if file is selected
    if ($_FILES["file"]["size"] > 0) {
        
        // Get the file name and open the file
        $filename = $_FILES["file"]["tmp_name"];
        $file = fopen($filename, "r");

        // Read each row of the CSV file
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            // Check if the array has at least 9 columns (or 8 indices, since indexing starts from 0)
            if (count($emapData) >= 9) {
                // Avoid undefined index issues by checking the array size
                $id = isset($emapData[0]) ? $emapData[0] : ''; // ID should be the first element
                $first_name = isset($emapData[1]) ? $emapData[1] : '';
                $middle_name = isset($emapData[2]) ? $emapData[2] : '';
                $last_name = isset($emapData[3]) ? $emapData[3] : '';
                $gpa = isset($emapData[4]) ? $emapData[4] : '';
                $year_of_graduation = isset($emapData[5]) ? $emapData[5] : '';
                $qualification = isset($emapData[6]) ? $emapData[6] : '';
                $gender = isset($emapData[7]) ? $emapData[7] : '';
                $department = isset($emapData[8]) ? $emapData[8] : '';

                // SQL query to insert the data into the database
                $sql = "INSERT INTO student (ID, Frist_Name, Midle_Name, Last_Name, Cumulative_Gpa, Year_of_Graduation, Qualification, Gender, Department) 
                        VALUES ('$id', '$first_name', '$middle_name', '$last_name', '$gpa', '$year_of_graduation', '$qualification', '$gender', '$department')";
                
                // Using mysqli_query instead of mysql_query
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    echo "<script type=\"text/javascript\">
                            alert(\"Error importing data: " . mysqli_error($conn) . "\");
                            window.location = \"index.php\"
                        </script>";
                    exit(); // Stop further execution on error
                }
            } else {
                // If the CSV row doesn't contain the expected number of columns
                echo "<script type=\"text/javascript\">
                        alert(\"Invalid data in row: " . implode(",", $emapData) . "\");
                        window.location = \"index.php\"
                    </script>";
                exit();
            }
        }

        // Close the file and the connection
        fclose($file);

        // Successful import message
        echo "<script type=\"text/javascript\">
                alert(\"Graduated Students File Imported Successfully.\");
                window.location = \"index.php\"
            </script>";
        
        // Close the database connection
        mysqli_close($conn);
    }
}
?>
