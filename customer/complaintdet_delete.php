<?php
include('../dbconnect/db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM complaints WHERE complaint_id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Deleted successfully.');
            window.location = 'complaintdet_view.php';
        </script>";
    } else {
        echo "<script>
            alert('Error deleting: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>alert('Invalid complaint ID'); window.history.back();</script>";
}
?>
