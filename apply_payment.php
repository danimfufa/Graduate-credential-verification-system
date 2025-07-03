
<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header('location:index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to database
    include 'db.php';// Collect form data
    $userId = $_POST['user_id'];
    $amount = $_POST['amount'];
 

    // Handle receipt upload
    $receipt = $_FILES['receipt'];
    $targetDir = "uploads/";
    $receiptPath = $targetDir . basename($receipt['name']);

    if (move_uploaded_file($receipt['tmp_name'], $receiptPath)) {
        // Save payment to database
        $stmt = $conn->prepare("INSERT INTO payments (user_id, amount, receipt, status, approval_date) VALUES ( ?, ?, ?,'Pending',?)");
        $stmt->bind_param("sdss", $userId, $amount, $receiptPath,$created_at);

        if ($stmt->execute()) {
            echo "<script>alert('Payment submitted successfully!');</script>";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error uploading receipt!');</script>";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply payment</title>
    <link href="good.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	body{
		background-color: dimgray;
	}
    .payment_form{
    border: 0;
    background-color: lightgray;
    margin: 15px;
    padding: 20px;
    height: 500px;
    width: 550px;
    margin-left:33%;
    margin-top: 40px;
    border-radius: 20px;
        }
       
        .input{
            border: 0;
            height: 40px;
            width: 100%;
            border-radius: 5px;
           
        }
        #button{
            border: 0;
            height: 40px;
            width: 100%;
            border-radius: 10px;
            background-color: darkslateblue;
            color: white;
            cursor: pointer; 
        }
        #button:hover{
            color: white;
            background-color: orangered;
            cursor: pointer;
            border: o;
            border-radius: 10px;
        }
        a{
            text-decoration: none;
            cursor: pointer;
        }
        a:hover{
             text-decoration: none;
            cursor: pointer;
            color: white;
            background-color: orangered;
        }
        .payment_method{
            height: 100px;
            background-color: lightgray;
            border-radius: 8px;
        }
</style>
</head>
<body>

	<?php include "external_user_header.php"; ?>
      
<div id="leftsh">
<?php
include "external_user_left.php";
?>
</div>	

<div class="payment_form">
    <h1 align='center'>Payment Methods</h1><br>
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="payment_method">
        <?php 
        include 'db.php';
        echo "<h2 align='center'>Upload Transaction Receipt:</h2><br>";

        $sql="SELECT content FROM pages WHERE page_name='Payment Method'";
          
          $query=mysqli_query($conn, $sql);
          if($query){
            if(mysqli_num_rows($query)>0){
              while($row=mysqli_fetch_array($query)){?>

              <h3><?php echo $row['content']."<br>";  ?></h3>
           <?php  
          }
        }
        }
          
          ?>
    </div><br>
    <input type="varchar" name="user_id" class="input" placeholder="User ID" required><br><br>
    <input type="text" name="amount" step="0.01"  class="input" placeholder="Amount" required><br><br>
    <label for="receipt">Transaction Receipt:</label><br>
    <input type="file" id="receipt" name="receipt" accept=".jpeg,.jpg,.png,.pdf" required><br><br>
    <button id="button" type="submit" name="submit">Submit</button><br><br><br>
    <p><font size='4' color='black'><a href="external_userdashboard.php">Back</a></font></p>
    </form>
    </div>



</body>
</html>














