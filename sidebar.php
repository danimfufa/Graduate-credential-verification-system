<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:logout.php');
} else{
    include 'includes/dbconnection.php';
?>
<div class="left-sidebar-pro">
<nav id="sidebar">
<div class="sidebar-header">
<?php
$uid=$_SESSION['username'];
$sql="SELECT username,email from user where username=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               
?>
<a href="profile.php"><img src="img/avatar.jpg" alt="User-Image" />
</a>
<h3><?php  echo $row->username;?></h3>
<p><?php  echo $row->email;?></p><?php $cnt=$cnt+1;}} ?>
</div>

<div class="left-custom-menu-adp-wrap">
<ul class="nav navbar-nav left-sidebar-menu-pro">
<li class="nav-item">
<a href="dashboard.php" role="button" aria-expanded="false"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> </a>

</li>
<li class="nav-item">
<a href="pending_payments.php" role="button" aria-expanded="false"><i class="fa fa-money"></i> <span class="mini-dn">View Pending Payments</span> </a></li>
<li class="nav-item">
<a href="approve_payment.php" role="button" aria-expanded="false"><i class="fa fa-money"></i> <span class="mini-dn">Approve Payments</span> </a></li>
<li class="nav-item">
<a href="generate_payment-report.php" role="button" aria-expanded="false"><i class="fa big-icon fa-envelope"></i> <span class="mini-dn">Generate Report</span> </a></li>
<li class="nav-item">
    <a href="logout.php"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
</li>

</ul>
</div>
</nav>
</div>
<?php }  ?>