<?php
session_start();
if (!isset($_SESSION['username'])) { 
    header("location:index.php");
} else {
?>
<html>
<head>
    <link href="good.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
    <title>Registerar page</title>
    <style>
.LeftApproveDiv{
    float: left;
    width: 600px;
    height: 600px;
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
        <?php
        include "registerarheader.php";
        ?>
        <div id="left">
            <?php
            include "registerarLeft.php";
            ?>
        </div>
                <?php
                // Check if 'cem' is set in POST request
                if (isset($_POST['cem'])) {
                    $cem = $_POST['cem'];
                } else {
                    // If 'cem' is not set, show an error message and redirect
                    echo '<script type="text/javascript">alert("Company email is missing!"); window.location="approveserreq2.php";</script>';
                    exit();
                }

                // Corrected database connection using mysqli
                include'db.php';
                // Query to fetch company details based on email
                $q = "SELECT * FROM company WHERE Company_Email='$cem'";
                $r = mysqli_query($conn, $q);

                if (mysqli_num_rows($r) == 0) {
                    echo "No such record exists";
                    exit();
                }

                // Loop through the result set and display the company details
                while ($row = mysqli_fetch_row($r)) {
                ?><div class="LeftApproveDiv">
                    <h2>Details of Company Infromation:</h2>
                    <form action="regApprovedcomdet.php?ID=<?php echo $row[0]; ?>" method="post">
                        <table cellspacing="20" cellpadding="10">
                            <tr><td><b>Employe ID:</b></td><td><?php echo $row[0];?></td></tr>
                            <tr><td><b>Company Name:</b></td><td><?php echo $row[1];?></td></tr>
                            <tr><td><b>Company Phone:</b></td><td><?php echo $row[2];?></td></tr>
                            <tr><td><b>Company Email:</b></td><td><?php echo $row[3];?></td></tr>
                            <tr><td><b>Company Country:</b></td><td><?php echo $row[4];?></td></tr>
                            <tr><td><b>Company City:</b></td><td><?php echo $row[5];?></td></tr>
                            <tr><td><b>Date:</b></td><td><?php echo $row[6];?></td></tr>
                            <tr><td><b>Reason of Verification:</b></td><td><?php echo $row[7];?></td></tr>
                            <tr><td><b>Enter Remark:</b></td><td><span id="sprytextarea1">
                                <label><textarea name="rer" rows="3" cols="20"></textarea></label>
                                <span class="textareaRequiredMsg">Remark required.</span></span></td></tr>
                            <tr><td><b>Approval:</b></td><td>
                                <select name="regA" id="span9001">
                                    <option>--select one--</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Disapproved">Disprove</option>
                                </select>
                            </td></tr>
                        </table>
                        <button type="submit" name="regsub" value="Submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                <?php
                }

                mysqli_close($conn); // Close the database connection
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
    </script>
     <script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
</body>
</html>
<?php
}
?>
