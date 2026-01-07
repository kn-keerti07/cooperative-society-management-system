<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Holder Details</title>
  <link rel="stylesheet" href="styles.css">
  
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #eef2f3;
      margin: 0;
      padding: 0;
    }

    .header {
      padding: 20px;
      text-align: center;
      color: #000; /* Plain black text */
      background-color: transparent; /* No background */
      border: none; /* No border */
    }

    h1.page-title {
      font-size: 28px;
      margin: 0;
    }

    form {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      border: 2px solid #000000; /* Black border */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      max-width: 700px;
      margin: 40px auto;
      transition: all 0.3s ease-in-out;
    }

    table {
      width: 100%;
    }

    td {
      padding: 12px 10px;
      vertical-align: top;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 7px;
      box-sizing: border-box;
      font-size: 14px;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"],
    input[type="reset"] {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin: 10px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    input[type="reset"] {
      background-color: #dc3545;
      color: white;
    }

    input[type="reset"]:hover {
      background-color: #a71d2a;
    }

    input[type="file"] {
      border: none;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
    }

    .form-footer {
      text-align: center;
      margin-top: 20px;
    }

    #error-message {
      color: red;
      display: none;
      text-align: center;
      font-weight: bold;
    }
  </style>

</head>

<body>
<!-- Back to Admin Dashboard Button -->
<a href="accountholderdet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
  <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>


  <div class="header">
    <h1 class="page-title">Account Holder Details</h1>
  </div>

  <?php
  include('../dbconnect/db.php');

  function generateUniqueAccountNumber($conn) {
    do {
      $accNo = rand(1000000000, 9999999999);
      $query = "SELECT * FROM account_holder WHERE Account_No = '$accNo'";
      $result = mysqli_query($conn, $query);
    } while (mysqli_num_rows($result) > 0);

    return $accNo;
  }

  $generatedAccNo = generateUniqueAccountNumber($conn);
  ?>

  <!-- Add the error message div -->
  <div id="error-message">Please fill in all the required fields.</div>

  <form name="form1" id="formID" method="post" action="accountholderdet_insert.php" enctype="multipart/form-data">
    <table border="0">
      <tr><td>Full Name</td><td><input name="Fullname" class="validate[required,custom[onlyLetter]]" type="text" id="Fullname"></td></tr>
      <tr><td>Date of Birth</td><td><input name="dob" class="validate[required,custom[date]]" type="date" id="dob"></td></tr>
      <tr><td>Gender</td>
        <td>
          <input name="Gend" type="radio" value="Male"> Male
          <input name="Gend" type="radio" value="Female"> Female
        </td>
      </tr>
      <tr><td>Address</td><td><textarea name="Adrs" class="validate[required]" id="Adrs"></textarea></td></tr>
      <tr><td>Email ID</td><td><input name="emailid" class="validate[required,custom[email]]" type="text" id="emailid"></td></tr>
      <tr><td>Contact No</td><td><input name="contactno" class="validate[required,custom[mobile]]" type="text" id="contactno"></td></tr>
      <tr><td>Occupation</td><td><input name="occupa" class="validate[required,custom[onlyLetter]]" type="text" id="occupa"></td></tr>
      <tr><td>Account No</td><td><input name="accno" value="<?php echo $generatedAccNo; ?>" readonly class="validate[required]" type="text" id="accno"></td></tr>
      <tr><td>Create Date</td><td><input name="createdate" value="<?php echo date('Y-m-d');?>" class="validate[required,custom[date]]" type="date" id="createdate"></td></tr>
      <tr><td>Account Holder Photo</td><td><input name="accholderphoto" class="validate[required]" type="file" id="accholderphoto"></td></tr>
      <tr><td>Signature</td><td><input name="sign" class="validate[required]" type="file" id="sign"></td></tr>
      <tr><td>Aadhar No</td><td><input name="adharno" class="validate[required,custom[onlyNumber]]" type="text" id="adharno"></td></tr>
    </table>

    <div class="form-footer">
      <input type="submit" name="Submit" value="Submit">
      <input type="reset" name="reset" value="Reset">
    </div>
  </form>

  <?php include('footer.php'); ?>

  <!-- JavaScript for form validation -->
  <script>
    document.getElementById('formID').addEventListener('submit', function(event) {
      let fullname = document.getElementById('Fullname').value;
      let dob = document.getElementById('dob').value;
      let emailid = document.getElementById('emailid').value;
      let contactno = document.getElementById('contactno').value;
      let occupa = document.getElementById('occupa').value;
      let accholderphoto = document.getElementById('accholderphoto').value;
      let sign = document.getElementById('sign').value;
      let adharno = document.getElementById('adharno').value;

      // Check if any required field is empty
      if (!fullname || !dob || !emailid || !contactno || !occupa || !accholderphoto || !sign || !adharno) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('error-message').style.display = 'block'; // Show error message
        alert('Please fill in all the required fields.'); // Show pop-up alert
      }
    });
  </script>

</body>
</html>
