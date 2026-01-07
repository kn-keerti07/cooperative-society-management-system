<?php
include('../dbconnect/db.php');

// Backend validation (Check if required fields are empty)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['Fullname']) || empty($_POST['dob']) || empty($_POST['emailid']) || empty($_POST['contactno']) || 
        empty($_POST['occupa']) || empty($_FILES['accholderphoto']['name']) || empty($_FILES['sign']['name']) || empty($_POST['adharno'])) {
        
        // Show error message if any field is empty
        echo "<script>alert('Please fill in all the required fields.');</script>";
        exit(); // Stop further processing
    } else {
        // Assign values to variables after validation
        $Full_Name = $_POST['Fullname'];
        $Date_of_Birth = $_POST['dob'];
        $Gender = $_POST['Gend'];
        $Address = $_POST['Adrs'];
        $Email_ID = $_POST['emailid'];
        $Contact_No = $_POST['contactno'];
        $Occupation = $_POST['occupa'];
        $Account_No = $_POST['accno'];
        $Create_Date = $_POST['createdate'];
        $Aadhar_No = $_POST['adharno'];

        // File upload handling
        $photoName = $_FILES['accholderphoto']['name'];
        $signName = $_FILES['sign']['name'];
        $photoTmp = $_FILES['accholderphoto']['tmp_name'];
        $signTmp = $_FILES['sign']['tmp_name'];

        $photoDest = "../uploads/photos/" . $photoName;
        $signDest = "../uploads/signatures/" . $signName;

        // Move uploaded files to destination directories
        move_uploaded_file($photoTmp, $photoDest);
        move_uploaded_file($signTmp, $signDest);

        // Insert data into account_holder table
        $sql = "INSERT INTO account_holder VALUES (
            NULL,
            '$Full_Name',
            '$Date_of_Birth',
            '$Gender',
            '$Address',
            '$Email_ID',
            '$Contact_No',
            '$Occupation',
            '$Account_No',
            '$Create_Date',
            '$photoDest',
            '$signDest',
            '$Aadhar_No'
        )";
        mysqli_query($conn, $sql);

        // Insert data into login table
        $sql2 = "INSERT INTO login VALUES (
            NULL,
            '$Account_No',
            '$Account_No',
            'customer',
            'Active'
        )";
        mysqli_query($conn, $sql2);

        // Alert and redirect after successful insertion
        echo "<script>
            alert('Inserted successfully!');
            document.location = 'accountholderdet_view.php';
        </script>";
    }
}
?>
