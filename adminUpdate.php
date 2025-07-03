<?php
session_start();
if (!isset($_SESSION['username'])) { 
    header("location:index.php");
} else {
    include 'db.php';
?>
<html>
<head>
    <link href="good.css" rel="stylesheet" type="text/css" />
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <title>Administrator Page</title>
    <style>
           .StudentInfo{
            float: left;
            margin: 10px;
            padding: 10px;
            width:80%;
        }

        table{
            padding: 5px;
            margin: 5px;
            border-collapse: collapse;
            background-color: white;
            width: 800px;
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
?></div>
    
        <div class="StudentInfo">

            <h3>Graduated Students Information:</h3>
            <form action="adminUpdatepro.php" method="post">
                <table border="1" cellspacing="0" width="84%">
                    <tr><td colspan="12"><h2 align="left"><a href="export-csv/export.php">Export</a></h2></td></tr>
                    <tr >
                        <th>ID</th><th>First_Name</th><th>Middle_Name</th><th>Last_Name</th>
                        <th>Gpa</th><th>Year</th><th>Qualification</th><th>Gender</th>
                        <th>Department</th><th>Photo</th><th>Edit</th><th>Delete</th>
                    </tr>
                    <?php
                    // Connect to the database using mysqli
                    include 'db.php';
                    // Fetch data from the 'student' table
                    $q = "SELECT * FROM student";
                    $r = mysqli_query($conn, $q);

                    while ($row = mysqli_fetch_assoc($r)) {
                        $Id = $row['ID'];
                        $fn = $row['Frist_Name'];
                        $mn = $row['Midle_Name'];
                        $ln = $row['Last_Name'];
                        $cg = $row['Cumulative_Gpa'];
                        $yog = $row['Year_of_Graduation'];
                        $q = $row['Qualification'];
                        $g = $row['Gender'];
                        $d = $row['Department'];
                        $p = $row['Photo'];
                    ?>
                    <tr >
                        <td><strong><?php echo $Id;?></strong></td>
                        <td><strong><?php echo $fn;?></strong></td>
                        <td><strong><?php echo $mn;?></strong></td>
                        <td><strong><?php echo $ln;?></strong></td>
                        <td><strong><?php echo $cg;?></strong></td>
                        <td><strong><?php echo $yog;?></strong></td>
                        <td><strong><?php echo $q;?></strong></td>
                        <td><strong><?php echo $g;?></strong></td>
                        <td><strong><?php echo $d;?></strong></td>
                        <td><strong><img src="imagepro.php?ID=<?php echo $row['ID']?>" width="30" height="50"></td>
                        <td><strong><a href="adminUpdatepro.php?ID=<?php echo $Id;?>"><img src="iterfaceimage/update-icon.png" width="30" height="50">Update</a></strong></td>
                        <td><strong><a href="admindeletestudent.php?ID=<?php echo $Id;?>" onclick="return confirm('Are You Sure You Want to Permanently Delete Student Data?')">
                            <img src="iterfaceimage/delete-icon.jpg" width="30" height="40">Delete
                        </a></strong></td>
                    </tr>
                    <?php
                    }
                    mysqli_close($conn); // Close the database connection
                    ?>
                </table>
                <h1 align="left">
                    Total Students: <?php
                    // Reconnect and count the number of rows
                   include 'db.php';
                    $result = mysqli_query($conn, "SELECT * FROM student");
                    $numberOfRows = mysqli_num_rows($result);

                    if ($numberOfRows > 0) {
                        echo '<font size="6" color="#FF0000" bgcolor="#003366">' . $numberOfRows . '</font>';
                    } else {
                        echo "No students found!";
                    }
                    mysqli_close($conn);
                    ?> 
                </h1>
            </form>
        </div>
       

</body>
</html>
<?php
}
?>
