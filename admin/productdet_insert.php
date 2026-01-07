<?php
include('../dbconnect/db.php');

// Sanitize input values
$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
$product_price = mysqli_real_escape_string($conn, $_POST['product_price']);

// Validate inputs
if (empty($product_name) || empty($product_desc) || empty($product_price)) {
    die("Error: Please fill in all required fields.");
}

if (!is_numeric($product_price) || $product_price <= 0) {
    die("Error: Product price must be a positive number.");
}

// File validation: check if a file was uploaded and if it’s an image
if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] == 0) {
    $product_img = $_FILES["product_img"]['name'];
    $tmp_location = $_FILES["product_img"]["tmp_name"];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($product_img);
    
    // Validate file type (only images)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    
    if (!in_array($imageFileType, $allowed_types)) {
        die("Error: Only JPG, JPEG, PNG, & GIF files are allowed.");
    }
    
    // Validate file size (maximum 2MB)
    if ($_FILES["product_img"]["size"] > 2000000) {
        die("Error: File size must not exceed 2MB.");
    }
    
    // Move the file to the target directory
    move_uploaded_file($tmp_location, $target_file);
} else {
    die("Error: Please upload a valid product image.");
}

// Insert into database
$sql = "INSERT INTO products (product_name, product_desc, product_img, product_price, product_status) 
        VALUES ('$product_name', '$product_desc', '$product_img', '$product_price','Stock')";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Product inserted successfully.");</script>';
    echo '<script>document.location="productdet_view.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
