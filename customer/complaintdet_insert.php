<?php
include('../dbconnect/db.php');

$accountholder_id = $_POST['accholder_id'];
$com_title = $_POST['com_title'];
$com_desc = $_POST['com_desc'];
$com_date = $_POST['com_date'];

// Assuming complaint_status is REQUEST and admin_response/response_date can be NULL
$sql = "INSERT INTO complaints (
    complaint_id, accountholder_id, complaint_title, complaint_description, complaint_date, complaint_status, admin_response, response_date
) VALUES (
    NULL, '$accountholder_id', '$com_title', '$com_desc', '$com_date', 'REQUEST', NULL, NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Complaint submitted successfully.'); window.location='complaintdet_view.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
}
?>
