<?php
include('../dbconnect/db.php');

// Get the selected account holder ID from the GET request
$accountholder_id = isset($_GET['accountholder_id']) ? $_GET['accountholder_id'] : '';

// Query to calculate the balance for the selected account holder
$sql = "SELECT 
            COALESCE(SUM(CASE 
                WHEN transaction_type = 'DEPOSIT' THEN amount
                WHEN transaction_type = 'WITHDRAWAL' THEN -amount
                ELSE 0 END), 0) AS balance
        FROM transaction
        WHERE accountholder_id = '$accountholder_id'";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

// Output the balance
echo number_format($row['balance'], 2);
?>
