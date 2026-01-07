<?php
include('../dbconnect/db.php');

// Check if 'id' is passed in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request.");
}

$complaint_id = $_GET['id'];  // Get the complaint ID from the URL

// Fetch complaint details from the database
$sql = "SELECT * FROM complaints WHERE complaint_id = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, 'i', $complaint_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $complaint = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
} else {
    die("Error fetching complaint details.");
}

// Process the form submission when it's a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect the form data
    $admin_response = $_POST['admin_response'];
    $response_date = $_POST['response_date'];
    $complaint_id = $_POST['complaint_id'];

    // Validate if the fields are not empty
    if (empty($admin_response) || empty($response_date)) {
        die("All fields are required.");
    }

    // Prepare the SQL query to update the complaint response
    $sql = "UPDATE complaints SET admin_response = ?, response_date = ?, complaint_status = 'Resolved' WHERE complaint_id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssi', $admin_response, $response_date, $complaint_id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: complaintdet_view.php?msg=responded");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respond to Complaint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add CSS styling here */
    </style>
</head>
<body>

<div class="content">
    <div class="header">
        <h1 class="page-title">Respond to Complaint</h1>
    </div>

    <div class="container-fluid">
        <!-- Form to respond to the complaint -->
        <form action="respond_complaint.php?id=<?php echo $complaint_id; ?>" method="POST" class="form-horizontal">
            <div class="well">
                <h3>Complaint Details</h3>

                <!-- Complaint Title -->
                <div class="form-group row">
                    <label class="col-md-3 col-form-label"><strong>Complaint Title:</strong></label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext"><?php echo $complaint['complaint_title']; ?></p>
                    </div>
                </div>

                <!-- Complaint Description -->
                <div class="form-group row">
                    <label class="col-md-3 col-form-label"><strong>Complaint Description:</strong></label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext"><?php echo $complaint['complaint_description']; ?></p>
                    </div>
                </div>

                <!-- Complaint Date -->
                <div class="form-group row">
                    <label class="col-md-3 col-form-label"><strong>Complaint Date:</strong></label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext"><?php echo $complaint['complaint_date']; ?></p>
                    </div>
                </div>

                <hr>

                <!-- Respond to Complaint Section -->
                <h3>Respond to Complaint</h3>

                <!-- Admin Response -->
                <div class="form-group row">
                    <label for="admin_response" class="col-md-3 col-form-label"><strong>Response:</strong></label>
                    <div class="col-md-9">
                        <textarea name="admin_response" class="form-control" placeholder="Enter your response here" rows="4" required></textarea>
                    </div>
                </div>

                <!-- Response Date -->
                <div class="form-group row">
                    <label for="response_date" class="col-md-3 col-form-label"><strong>Response Date:</strong></label>
                    <div class="col-md-9">
                        <input type="date" name="response_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                </div>

                <!-- Hidden Complaint ID -->
                <input type="hidden" name="complaint_id" value="<?php echo $complaint_id; ?>">

                <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Submit Response</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
