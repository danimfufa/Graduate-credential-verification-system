<?php
session_start();
if(!isset($_SESSION['username'])) { 
header("location:index.php");
} else {
	include 'db.php';
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>Registerar page</title>
<style>
	.LeftApproveDiv{
    float: left;
    width: 600px;
    height: 300px;
    margin: 10px;
    padding: 10px;
    margin-left: 100px;
    background-color: lightgrey;
    border-radius: 10px;
    font-size: 16px;
}
form{
    font-size: 16px;
}
form table{
    font-size: 16px;
}
button{
    margin-left: 45%;
    margin-top: 10%;
}
</style>
</head>
<body >
<?php include "registerarheader.php"; ?>

<div id="leftsh">
<?php include "registerarLeft.php"; ?>
</div>

<div class="LeftApproveDiv">
<h3>Verify Requested Services:</h3>
            <form action="regverify.php" method="post">
                <table cellspacing="20" cellpadding="10">
                    <tr>
                        <td><b><h2>Graduate ID:</h2></b></td>
                        <td>
                            <select name="Gid" id="span9001">
                                <?php
                                include 'db.php';
                                
            // Query to fetch employees
            $query = "SELECT * FROM employe";
            $result = $conn->query($query);
                                while ($employee = $result->fetch_assoc()) {
                                    // Check if employee's info is approved but not verified
                                    $employeeID = $employee['ID'];
                                    $approvalQuery = "SELECT * FROM request_approval WHERE Employe_ID = '$employeeID' AND Approval = 'Approved'";
                                    $approvalResult = $conn->query($approvalQuery);

                                    $verificationQuery = "SELECT * FROM info_verification WHERE ID = '$employeeID'";
                                    $verificationResult = $conn->query($verificationQuery);

                                    if ($approvalResult->num_rows > 0 && $verificationResult->num_rows == 0) {
                                        echo "<option value='{$employee['ID']}'>{$employee['ID']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary" name="search">&nbsp;View</button>
            </form>
</div>
</body>
</html>
<?php
}
?>
