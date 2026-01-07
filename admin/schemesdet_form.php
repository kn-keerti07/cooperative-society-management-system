<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scheme Details</title>
  <style>
    /* Your CSS Styles (same as before) */
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
  </style>

  <script>
    function validateForm() {
      // Get the form inputs
      var schemeName = document.getElementById("scheme_name").value;
      var schemeDesc = document.getElementById("scheme_desc").value;
      var schemeDuration = document.getElementById("scheme_duration").value;
      var schemeStatus = document.getElementById("scheme_status").value;
      var schemeAttach = document.getElementById("scheme_attach").value;

      // Check if any required fields are empty
      if (schemeName == "" || schemeDesc == "" || schemeDuration == "" || schemeStatus == "" || schemeAttach == "") {
        alert("Please fill in all the required fields and upload the attachment.");
        return false; // Prevent form submission
      }

      // Optionally, check file type (e.g., allow only PDFs)
      var fileExtension = schemeAttach.split('.').pop().toLowerCase();
      if (fileExtension !== "pdf" && fileExtension !== "docx" && fileExtension !== "xlsx") {
        alert("Please upload a valid file (PDF, DOCX, XLSX).");
        return false;
      }

      return true; // Allow form submission
    }
  </script>
</head>

<body>
<!-- Back to Admin Dashboard Button -->
<a href="schemesdet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
  <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

  <div class="header">
    <h1 class="page-title">Scheme Details</h1>
  </div>

  <form action="schemesdet_insert.php" method="post" enctype="multipart/form-data" name="form1" id="formID" onsubmit="return validateForm()">
    <table border="0">
      <tr>
        <td>Scheme Name</td>
        <td><input name="scheme_name" class="validate[required,custom[onlyLetter]]" type="text" id="scheme_name"></td>
      </tr>
      <tr>
        <td>Scheme Description</td>
        <td><textarea name="scheme_desc" class="validate[required]" id="scheme_desc"></textarea></td>
      </tr>
      <tr>
        <td>Scheme Attach File</td>
        <td><input name="scheme_attach" type="file" id="scheme_attach"></td>
      </tr>
      <tr>
        <td>Scheme Duration</td>
        <td><input name="scheme_duration" class="validate[required]" type="text" id="scheme_duration"></td>
      </tr>
      <tr>
        <td>Scheme Status</td>
        <td><select name="scheme_status" class="validate[required]" id="scheme_status">
          <option value="">SELECT</option>
          <option>ACTIVE</option>
          <option>INACTIVE</option>
        </select></td>
      </tr>
    </table>

    <div class="form-footer">
      <input type="submit" name="Submit" value="Submit">
      <input type="reset" name="reset" value="Reset">
    </div>
  </form>

  <?php include('footer.php'); ?>

</body>
</html>
