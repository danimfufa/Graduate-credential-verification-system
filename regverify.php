<?php
session_start();
include 'db.php';
if (!isset($_SESSION['username'])) { 
    header("location:index.php");
} else {
    // Error Reporting (only for development, remove in production)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<html>
<head>
    <link href="good.css" rel="stylesheet" type="text/css" />
    <link href="admin.css" rel="stylesheet" type="text/css" />
    <title>Registerar page</title>
    <style>
        .addstudent_form{
        padding: 10px;
		margin: 10px;
		float: left;
		width: 550px;
		height: 650px;
		background-color: white;
		border-radius: 10px;

        }
        .addstudent_form table{
            margin: 10px;
            padding: 10px;
            width: 70%;
            background-color: white;
        }
        .addstudent_right{
            margin: 10px;
		padding: 10px;
		float: left;
		width: 550px;
		height: 650px;
		background-color: white;
        border-radius: 10px;
        }
        .addstudent_right table{
            margin: 10px;
            padding: 10px;
            width: 70%;
            background-color: white;
        }
        button{
		margin-left: 20%;
		background-color: darkslateblue;
        color: white;
	}
       
    </style>
</head>
<body >

    <?php include "registerarheader.php"; ?>
    <div id="leftsh">
        <?php include "registerarLeft.php"; ?>
    </div>
   

            <?php
            // Ensure Gid is passed and set in POST
            if (isset($_POST['Gid'])) {
                $gid = $_POST['Gid'];

                // Query to fetch student details
                $q = "SELECT * FROM student WHERE ID='$gid'";
                $r = mysqli_query($conn, $q);

                // Display student information if exists
                if (mysqli_num_rows($r) > 0) {
                    echo "<div class='addstudent_form'><h2 align='center'>Original Graduated Student Information Details:</h2>";
                    echo '<table cellspacing="15" cellpadding="10">';
                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr><td><b>ID:</b></td><td>" . $row[0] . "</td></tr>";
                        echo "<tr><td><b>First Name:</b></td><td>" . $row[1] . "</td></tr>";
                        echo "<tr><td><b>Middle Name:</b></td><td>" . $row[2] . "</td></tr>";
                        echo "<tr><td><b>Last Name:</b></td><td>" . $row[3] . "</td></tr>";
                        echo "<tr><td><b>Year of Graduation:</b></td><td>" . $row[5] . "</td></tr>";
                        echo "<tr><td><b>Qualification:</b></td><td>" . $row[6] . "</td></tr>";
                        echo "<tr><td><b>Gender:</b></td><td>" . $row[7] . "</td></tr>";
                        echo "<tr><td><b>Department:</b></td><td>" . $row[8] . "</td></tr>";
echo "<tr><td><b>Photo:</b></td><td><img src='imagepro.php?ID=".$row[0] . "' width='150' height='150'></td></tr>";
                    }
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo "<h3><font color='red'>Original Student Information not available</font></h3>";
                }
            } else {
                echo "<script>alert('Graduate ID not available');</script>";
         
            }
            ?>
      

        
            <?php
            // Ensure Gid is passed and set in POST
            if (isset($_POST['Gid'])) {
                $gid = $_POST['Gid'];

                // Query to fetch employe details
                $q = "SELECT * FROM employe WHERE ID='$gid'";
                $r = mysqli_query($conn, $q);
                if (mysqli_num_rows($r) == 0) {
                    echo "No such record exists";
                    exit();
                }

                // Display employe information and the verification form
                while ($row = mysqli_fetch_row($r)) {
                    echo "<div class='addstudent_right'><h2 align='center'>Requested Graduated Student Information Details:</h2>";
                    echo '<form action="insertverification.php?ID=' . $row[0] . '" method="post">';
                    echo '<table cellspacing="15" cellpadding="10" bgcolor="#FFCC99">';
                    echo "<tr><td><b>ID:</b></td><td>" . $row[0] . "</td></tr>";
                    echo "<tr><td><b>First Name:</b></td><td>" . $row[1] . "</td></tr>";
                    echo "<tr><td><b>Middle Name:</b></td><td>" . $row[2] . "</td></tr>";
                    echo "<tr><td><b>Last Name:</b></td><td>" . $row[3] . "</td></tr>";
                    echo "<tr><td><b>Year of Graduation:</b></td><td>" . $row[4] . "</td></tr>";
                    echo "<tr><td><b>Qualification:</b></td><td>" . $row[5] . "</td></tr>";
                    echo "<tr><td><b>Gender:</b></td><td>" . $row[6] . "</td></tr>";
                    echo "<tr><td><b>Department:</b></td><td>" . $row[7] . "</td></tr>";
                    echo "<tr><td><b>Photo:</b></td><td><img src='imagepro2.php?ID=" . $row[0] . "' width='150' height='150'></td></tr>";
                    echo '</table>';
                    echo '<br>';
                    echo "<tr><td><b>Verification:</b>&nbsp;&nbsp;</td><td><select name='regA' id='span9001'>
                        <option>--select one--</option>
                        <option value='Verified'>Verify</option>
                        <option value='Unverified'>Reject</option>
                        </select></td></tr><br><br>";
                    echo "<button type='submit' class='btn btn-primary' name='regsub' value='Submit'>Submit</button>";
                    echo '</form>';
                    echo "</div>";
                }
            }
            ?>

</body>
</html>

<?php
}
?>
