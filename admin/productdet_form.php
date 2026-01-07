<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
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
<a href="productdet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
  <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<div class="header">
  <h1 class="page-title">Product Details</h1>
</div>

<form action="productdet_insert.php" method="post" enctype="multipart/form-data" name="form1" id="formID">
  <table border="0">
    <tr>
      <td>Product Name</td>
      <td><input name="product_name" class="validate[required,custom[onlyLetter]]" type="text" id="product_name"></td>
    </tr>
    <tr>
      <td>Product Description</td>
      <td><input name="product_desc" class="validate[required]" type="text" id="product_desc"></td>
    </tr>
    <tr>
      <td>Product Image</td>
      <td><input name="product_img" type="file" id="product_img"></td>
    </tr>
    <tr>
      <td>Product Price</td>
      <td><input name="product_price" class="validate[required,custom[onlyNumber]]" type="text" id="product_price"></td>
    </tr>
  </table>

  <div class="form-footer">
    <input type="submit" name="Submit" value="Submit">
    <input type="reset" name="reset" value="Reset">
  </div>
</form>

<?php include('footer.php'); ?>

<!-- JavaScript for Form Validation -->
<script>
document.getElementById('formID').addEventListener('submit', function(event) {
  // Get form field values
  let productName = document.getElementById('product_name').value;
  let productDesc = document.getElementById('product_desc').value;
  let productImage = document.getElementById('product_img').value;
  let productPrice = document.getElementById('product_price').value;

  // Check if any required field is empty
  if (!productName || !productDesc || !productImage || !productPrice) {
    event.preventDefault(); // Prevent form submission
    // Show pop-up error message
    alert('Please fill in all the required fields.');
    return false; // Prevent further execution
  }

  // Additional validation logic if needed (e.g., price as a number)
  if (isNaN(productPrice)) {
    event.preventDefault(); // Prevent form submission
    alert('Please enter a valid product price.');
    return false; // Prevent further execution
  }
});
</script>

</body>
</html>
