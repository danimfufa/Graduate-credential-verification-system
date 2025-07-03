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
    <style>
        .StudentInfo{
            float: left;
            margin: 10px;
            padding: 10px;
            width:80%;
        }
        table{
            border: 1px solid black;
        }
        form table{
            background-color: white;
          
           
        
        }
        button{
            float: right;
        }
    </style>
    </head>
    <body >
    <?php 
    include "registerarheader.php"; ?>

<div id="leftsh">
<?php
include "registerarLeft.php";
?>
</div>

    
<div class="StudentInfo">
   
    <form action="regupdatepro.php" method="post">
    <h3 align='center'><font color='black'> All Graduated Students Informations</font></h3>
    <table border='1' cellspacing="0" width="80%">
        <tr><th><h2><a href="export-csv/export.php">Export</a></h2></th></tr>
    <tr bgcolor='wheat'>
    <th>ID:</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Gpa</th>
    <th>Year</th>
    <th>Qualification</th>
    <th>Gender</th>
    <th>Department</th>
    <th>Photo</th>
    </tr>

    <?php
    // Using mysqli instead of mysql
   include 'db.php';

    $q = "SELECT * FROM student";
    $r = mysqli_query($conn, $q);

    while ($row = mysqli_fetch_array($r)) {
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
    <tbody>
    <tr>
    <td><?php echo $Id; ?></td>
    <td><?php echo $fn; ?></td>
    <td><?php echo $mn; ?></td>
    <td><?php echo $ln; ?></td>
    <td><?php echo $cg; ?></td>
    <td><?php echo $yog; ?></td>
    <td><?php echo $q; ?></td>
    <td><?php echo $g; ?></td>
    <td><?php echo $d; ?></td>
    <td><img src="imagepro.php?ID=<?php echo $row['ID']; ?>" width="50" height="50"></td>

    </tr>
    </tbody>
    <?php
    }
    ?>
    </table><br><br>
    </form>
</div>


    </body>
    </html>

    <?php
    }
    ?>
