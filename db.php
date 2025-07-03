<?php
$servaername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'wu_gcvs_db';

$conn = mysqli_connect($servaername, $username,$password,$dbname);
if(!$conn){
  die(mysqli_errno($conn));
}
?>