<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header('location:index.php');
}
else
{
?>
<html>
<head>
<title> Finance Officer Dashboard</title>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<style>
    .centerDiv{
        margin: 5px;
        padding: 5px;
        float: left;
        width: 765px;
        height: 600px;
    }
</style>
</head>
<body >
<nav>
<div>
<?php include "finance_officer_header.php"; ?>
</div>
</nav>

<div id="leftsh">
<?php
include "finance_officer_left.php";
?>
</div>


<div class="centerDiv">
    <h1> FINANCE OFFICE </h1>
    
</div>



</body>
</html>
<?php } ?>
