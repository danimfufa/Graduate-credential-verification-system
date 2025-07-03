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
    <title>Administrator Page</title>
    <style>
          .leftupdateuser{
            margin: 10px;
            padding: 10px;
            width: 400px;
            height: 400px;
            float: left;
        }
      
        table{
            background-color: white;
            margin: 5px;
            padding: 5px;
            margin-left: 10px;
        }
    </style>
</head>
<body >

<?php
    include "adminheader.php";
?>
  
<?php
    include "adminleft.php";
?>
 

   <div class="leftupdateuser">
            <h3 align='center'><font size='5' color='black'>Request Employee:</font></h3>
            <form action="adminUpdatepro.php" method="post">
                <table border="1" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>First_Name</th>
                        <th>Middle_Name</th>
                        <th>Last_Name</th>
                        <th>Year</th>
                        <th>Qualification</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Photo</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    // Use mysqli to connect to the database
                    include 'db.php';

                    $q = "SELECT * FROM employe";
                    $r = mysqli_query($conn, $q);

                    while ($row = mysqli_fetch_assoc($r)) {
                        $Id = $row['ID'];
                        $fn = $row['Frist_Name'];
                        $mn = $row['Midle_Name'];
                        $ln = $row['Last_Name'];
                        $yog = $row['Year_of_Graduation'];
                        $q = $row['Qualification'];
                        $g = $row['Gender'];
                        $d = $row['Department'];
                        $p = $row['Photo'];
                    ?>
                    <tr>
                        <td><strong><?php echo $Id; ?></strong></td>
                        <td><strong><?php echo $fn; ?></strong></td>
                        <td><strong><?php echo $mn; ?></strong></td>
                        <td><strong><?php echo $ln; ?></strong></td>
                        <td><strong><?php echo $yog; ?></strong></td>
                        <td><strong><?php echo $q; ?></strong></td>
                        <td><strong><?php echo $g; ?></strong></td>
                        <td><strong><?php echo $d; ?></strong></td>
                        <td><strong><img src="imagepro2.php?ID=<?php echo $row['ID']; ?>" width="100" height="50"></strong></td>
                        <td><strong>
                            <a href="admindeleteemploye.php?ID=<?php echo $Id; ?>" onclick="return confirm('Are you sure you want to permanently delete this data?')">Delete
                            </a>
                        </strong></td>
                    </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            </form>
                </div>

</body>
</html>
<?php
}
?>
