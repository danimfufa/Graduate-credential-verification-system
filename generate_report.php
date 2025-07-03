<?php 
if($_SERVER['REQUEST_METHOD']==='POST'){
require 'connection.php'; 
// Fetch payments from the database 
$sql = "SELECT id, name, email, amount, status, approval_date FROM payments 
WHERE status = 'Approved' ORDER BY approval_date DESC"; 
$stmt = $con->prepare($sql); 
$stmt->execute(); 
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC); 
// Export report as CSV 
if (isset($_POST['export'])) { 
$filename = "approved_payments_report_" . date('Ymd') . ".csv"; 
header("Content-Type: text/csv"); 
header("Content-Disposition: attachment; filename=$filename"); 
// Open file pointer to output 
$output = fopen("php://output", "w"); 
// Write column headers 
fputcsv($output, ['ID', 'Name', 'Email', 'Amount', 'Status', 'Approval_Date']); 
// Write rows 
foreach ($payments as $payment) { 
fputcsv($output, $payment); 
} 

fclose($output); 
exit; 
} 
}
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Generate Payment Report</title> 
</head> 
<body> 
<h1>Approved Payment Report</h1> 

<table border="1" cellspacing="0"> 
<thead> 
<tr> 
<th>ID</th> 
<th>Name</th> 
<th>Email</th> 
<th>Amount</th> 
<th>Status</th> 
<th>Approval_Date</th> 
</tr> 
</thead> 
<tbody> 
<?php foreach ($payment as $payments): ?> 
<tr> 
<td><?= htmlspecialchars($payment['id']) ?></td> 
<td><?= htmlspecialchars($payment['name']) ?></td> 
<td><?= htmlspecialchars($payment['email']) ?></td> 
<td><?= htmlspecialchars($payment['amount']) ?></td> 
<td><?= htmlspecialchars($payment['status']) ?></td> 
<td><?= htmlspecialchars($payment['approval_date']) ?></td> 
</tr> 
<?php endforeach; ?> 
</tbody> 
</table> 

<form method="POST"> 
<button type="submit" name="export">Download CSV Report</button> 
</form> 
</body> 
</html>