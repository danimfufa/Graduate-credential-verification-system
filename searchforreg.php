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
    <title>Registrar Page</title>
    <style type="text/css">
        .SearchStudentInfo{
            
        }
    </style>
</head>
<body >
        <?php include "registerarheader.php"; ?>
        <div id="leftsh">
            <?php include "registerarLeft.php"; ?>
        </div>
        
               <div class="SearchStudentInfo">
                    <h3><p>Graduated Information:</p></h3>
               
                <form method="post" action="viewreg.php">
                    <table border="1" cellspacing="0">
                        <tr >
                            <th >ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>GPA</th>
                            <th>Year of Graduation</th>
                            <th>Qualification</th>
                            <th>Gender</th>
                            <th>Department</th>
                        </tr>
                        <?php
                        include 'db.php';
                            // Get search value and search type
                            $cbo = $_POST['cbosearch'];
                            $search = $_POST['search'];

                            // Check if connection was successful
                            if ($conn === false) {
                                die("ERROR: Could not connect to the database. " . mysqli_connect_error());
                            }

                            // Start search query based on search type
                            if ($cbo == "Student_ID") {
                                $result = mysqli_query($conn, "SELECT * FROM student WHERE id LIKE '%$search%'");

                                while ($row1 = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row1[0]; ?></td>
                                        <td><?php echo $row1[1]; ?></td>
                                        <td><?php echo $row1[2]; ?></td>
                                        <td><?php echo $row1[3]; ?></td>
                                        <td><?php echo $row1[4]; ?></td>
                                        <td><?php echo $row1[5]; ?></td>
                                        <td><?php echo $row1[6]; ?></td>
                                        <td><?php echo $row1[7]; ?></td>
                                        <td><?php echo $row1[8]; ?></td>
                                    </tr>
                                    <?php
                                }
                            } elseif ($cbo == "First_Name") {
                                $result2 = mysqli_query($conn, "SELECT * FROM student WHERE Frist_Name LIKE '%$search%'");

                                while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row2[0]; ?></td>
                                        <td><?php echo $row2[1]; ?></td>
                                        <td><?php echo $row2[2]; ?></td>
                                        <td><?php echo $row2[3]; ?></td>
                                        <td><?php echo $row2[4]; ?></td>
                                        <td><?php echo $row2[5]; ?></td>
                                        <td><?php echo $row2[6]; ?></td>
                                        <td><?php echo $row2[7]; ?></td>
                                        <td><?php echo $row2[8]; ?></td>
                                    </tr>
                                    <?php
                                }
                            } elseif ($cbo == "Middle_Name") {
                                $result3 = mysqli_query($conn, "SELECT * FROM student WHERE Midle_Name LIKE '%$search%'");

                                while ($row3 = mysqli_fetch_array($result3)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row3[0]; ?></td>
                                        <td><?php echo $row3[1]; ?></td>
                                        <td><?php echo $row3[2]; ?></td>
                                        <td><?php echo $row3[3]; ?></td>
                                        <td><?php echo $row3[4]; ?></td>
                                        <td><?php echo $row3[5]; ?></td>
                                        <td><?php echo $row3[6]; ?></td>
                                        <td><?php echo $row3[7]; ?></td>
                                        <td><?php echo $row3[8]; ?></td>
                                    </tr>
                                    <?php
                                }
                            } elseif ($cbo == "Last_Name") {
                                $result4 = mysqli_query($conn, "SELECT * FROM student WHERE Last_Name LIKE '%$search%'");

                                while ($row4 = mysqli_fetch_array($result4)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row4[0]; ?></td>
                                        <td><?php echo $row4[1]; ?></td>
                                        <td><?php echo $row4[2]; ?></td>
                                        <td><?php echo $row4[3]; ?></td>
                                        <td><?php echo $row4[4]; ?></td>
                                        <td><?php echo $row4[5]; ?></td>
                                        <td><?php echo $row4[6]; ?></td>
                                        <td><?php echo $row4[7]; ?></td>
                                        <td><?php echo $row4[8]; ?></td>
                                    </tr>
                                    <?php
                                }
                            } elseif ($cbo == "Cumulative_GPA") {
                                $result5 = mysqli_query($conn, "SELECT * FROM student WHERE Cumulative_Gpa LIKE '$search%'");

                                while ($row5 = mysqli_fetch_array($result5)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row5[0]; ?></td>
                                        <td><?php echo $row5[1]; ?></td>
                                        <td><?php echo $row5[2]; ?></td>
                                        <td><?php echo $row5[3]; ?></td>
                                        <td><?php echo $row5[4]; ?></td>
                                        <td><?php echo $row5[5]; ?></td>
                                        <td><?php echo $row5[6]; ?></td>
                                        <td><?php echo $row5[7]; ?></td>
                                        <td><?php echo $row5[8]; ?></td>
                                    </tr>
                                    <?php
                                }
                            } elseif ($cbo == "Year_Of_Graduation") {
                                $result6 = mysqli_query($conn, "SELECT * FROM student WHERE Year_of_Graduation LIKE '$search%'");

                                while ($row6 = mysqli_fetch_array($result6)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row6[0]; ?></td>
                                        <td><?php echo $row6[1]; ?></td>
                                        <td><?php echo $row6[2]; ?></td>
                                        <td><?php echo $row6[3]; ?></td>
                                        <td><?php echo $row6[4]; ?></td>
                                        <td><?php echo $row6[5]; ?></td>
                                        <td><?php echo $row6[6]; ?></td>
                                        <td><?php echo $row6[7]; ?></td>
                                        <td><?php echo $row6[8]; ?></td>
                                    </tr>
                                    <?php
                                }
                            }

                            // Close the connection after the search
                            mysqli_close($conn);
                        ?>
                    </table><br>
                    <button class="btn btn-primary" onclick="window.location.href='viewreg.php'" style="float: rignt;">Back to Search Page</button>
                </form>
            </div>
         
   
</body>
</html>
<?php
}
?>
