<?php
// Start session if needed (optional)
// session_start();

// DB connection details — update if needed
$servername = "localhost";
$username = "root";
$password = "";
$database = "csms"; // <-- Change to your actual DB name

// Create DB connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data safely
$scheme_name = $_POST['scheme_name'];
$scheme_desc = $_POST['scheme_desc'];
$scheme_duration = $_POST['scheme_duration'];
$scheme_status = $_POST['scheme_status'];

// Handle file upload
$scheme_attachfile = '';
if (isset($_FILES['scheme_attach']) && $_FILES['scheme_attach']['error'] === 0) {
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create uploads directory if not exists
    }

    $fileName = basename($_FILES["scheme_attach"]["name"]);
    $scheme_attachfile = $uploadDir . $fileName;
    move_uploaded_file($_FILES["scheme_attach"]["tmp_name"], $scheme_attachfile);
} else {
    echo "File upload failed. Please try again.";
    exit;
}

// Prepare and execute insert query
$sql = "INSERT INTO schemes (scheme_name, scheme_description, scheme_attachfile, scheme_duration, scheme_status)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters (s = string, d = integer)
$stmt->bind_param("sssds", $scheme_name, $scheme_desc, $scheme_attachfile, $scheme_duration, $scheme_status);

if ($stmt->execute()) {
    echo "<script>alert('Scheme added successfully!'); window.location.href='schemesdet_view.php';</script>";
} else {
    echo "Insert error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
