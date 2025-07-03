<?php
session_start();
if(!isset($_SESSION['username']))
{ 
header("location:index.php");
}
else
{
	include 'db.php';

// Handle Page Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["page_name"]) && isset($_POST["content"])) {
    $page_name = $_POST["page_name"];
    $content = $_POST["content"];

    // Check if page already exists
    $sql = "SELECT id FROM pages WHERE page_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $page_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Update existing page
        $sql_update = "UPDATE pages SET content = ? WHERE page_name = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ss", $content, $page_name);
        $stmt_update->execute();
        $stmt_update->close();
        echo "<script>alert('Page information updated successfully!');</script>";
    } else {
        // Insert new page
        $sql_insert = "INSERT INTO pages (page_name, content) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $page_name, $content);
        $stmt_insert->execute();
        $stmt_insert->close();
        echo "<script>alert('Page information added successfully!');</script>";
    
    }
    $stmt->close();
}

$conn->close();
?>
<html>
<head>
<link href="good.css" rel="stylesheet" type="text/css" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<title>
Adminstrator page
</title>
<style type="text/css">
  .leftDiv{
        margin: 5px;
        padding: 5px;
        float: left;
        width: 600px;
        height: 400px;
        background-color: lightgray;
        margin-left:100px;
        border-radius: 10px;


    }
    select, textarea{
        width: 95%;
        padding: 10px;
        margin: 10px;
    }
    .leftDiv label{
        padding: 10px;
        margin: 10px;
        font-size: 14px; 

    }
    button{
        background-color: darkslateblue;
        color: white;
        align-items: center;
        border: 0;
        margin-left: 45%;
        height: 40px;
        border-radius: 5px;
        font-size: 14px;
    }
    button{
        cursor: pointer;
    }
</style>
</head>
<body>
<?php
include "adminheader.php";
?>
<div id="leftsh">
<?php
include "adminleft.php";
?>
</div>


<div class="leftDiv">
<form method="POST">
    <label for="page_name">Select Page Title:</label>
    <select name="page_name">
        <option value="About Us">About Us</option>
        <option value="Contact Us">Contact Us</option>
        <option value="Help">Help</option>
        <option value="Payment Method">Payment Method</option>
    </select><br><br>

    <label for="content">Page Content:</label>
    <textarea name="content" rows="5" required></textarea><br><br>

    <button type="submit" name="submit">Save Changes</button>
</form>
</div>




</body>
</html>
<?php
}
?>