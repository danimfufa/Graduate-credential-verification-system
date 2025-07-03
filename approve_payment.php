<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header('location:index.php');
}
 if($_SERVER['REQUEST_METHOD']==='POST'){

      // Database connection
      include 'db.php';
  
      // Collect input
      $paymentId = $_POST['user_id'];
      $newStatus = $_POST['status'];
  
      // Update payment status in the database
      $stmt = $conn->prepare("UPDATE payments SET status = ? WHERE user_id = ?");
      $stmt->bind_param("si", $newStatus, $paymentId);
  
      if ($stmt->execute()) {
          echo "<script>alert('Payment status updated successfully!');</script>";
      } else {
          echo "<script>alert('Failed to update payment status!');</script>";
      }
  
      $stmt->close();
      $conn->close();
  }
?>
<html>
<head>
<title> Finance Officer Approval Page</title>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<style>
  .leftDiv{
    text-align: center;
        margin: 10px;
        padding: 10px;
        float: left;
        width: 430px;
        height: 300px;
        background-color: lightgray;
        margin-left:200px;
        margin-top: 50px;
        border-radius: 7px;

    }
      .leftDiv input, select{
        width: 98%;
        padding: 8px;
        border-radius: 7px;
      }
      button{
        width: 100px;
        height: 30px;
        font-size: 14px;
        color: white;
        background-color: darkslateblue;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
      }
      button:hover{
        color: white;
        background-color: orangered;
      }

 
  
</style>
</head>
<body >
<nav>
<div>
<?php include "finance_officer_header.php"; ?>
</div>
</nav>

<aside>
<div id="left">
<?php
include "finance_officer_left.php";
?>	
</div>
</aside>

<div class="leftDiv">
<form method="POST" action="update_payment_by_accepting.php">
  <h3>Approve payment</h3>
    <label for="payment_id">Select UserID:</label><br>
    <select name="payment_id">
       <?php 
       include 'db.php';
       $id="SELECT user_id from payments WHERE status='Pending'";
       $result=mysqli_query($conn, $id);
       if($result){
        $row=mysqli_num_rows($result);
        if($row>0){
            while($count=mysqli_fetch_array($result)){?>

       <option value="<?php echo $count['user_id'];?>"><?php echo $count['user_id'];?></option>
        
    <?php 
          }
       }
    }
       ?>

    </select><br><br>
    <label for="status">Change Status:</label>
    <select name="status" required>
        <option value="Accepted">Accepted</option>
        <option value="Pending">Pending</option>
        <option value="Rejected">Rejected</option>
    </select><br><br>
    
    <button type="submit">Submit</button>
</form>
</div>

</body>
</html>

