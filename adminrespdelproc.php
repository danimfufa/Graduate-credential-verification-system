<?php
include 'db.php';
$gid=$_POST['id'];
$q="delete from report where ID='$gid'";
mysqli_query($conn, $q);
?>