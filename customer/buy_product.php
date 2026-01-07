<?php
include('../dbconnect/db.php');
session_start(); // Needed to access session variables

// 1. Retrieve data from GET
$product_id = $_GET['id'];
$quantity = $_GET['quantity'];
$request_date = date('Y-m-d');
$request_status = 'Pending';

// 2. Get accountholder_id from session
if (!isset($_SESSION['uname'])) {
    die("User not logged in.");
}
$accountholder_id = $_SESSION['uname'];

// 3. Insert into product_request table
$sql = "INSERT INTO product_request (product_id, account_no, quantity, request_date, request_status)
        VALUES ('$product_id', '$accountholder_id', '$quantity', '$request_date', '$request_status')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Product request submitted successfully!'); window.location.href='productdet_view.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
