<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}else{
    include 'db.php';
 $gid=$_GET['ID'];
$q = "select Photo,Photo_type from student WHERE ID='$gid'";
$r=mysqli_query($conn, $q);
if($r)
{
 $row= mysqli_fetch_array($r);
 $type="content-type:".$row['Photo_type'];
 header($type);
echo $row['Photo'];
}
else
{
 echo mysqli_error($conn);
 }
}
?>