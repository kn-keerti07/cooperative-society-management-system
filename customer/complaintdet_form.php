<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaint Details</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #eef2f3 !important;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #004085;
      padding: 20px;
      text-align: center;
      color: #fff;
      border-bottom: 5px solid #007bff;
    }

    h1.page-title {
      font-size: 28px;
      margin: 0;
    }

    .content {
      padding: 20px;
    }

    .well {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      border: 2px solid #007bff;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      max-width: 700px;
      margin: 40px auto;
      transition: all 0.3s ease-in-out;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 12px 10px;
      vertical-align: top;
      font-weight: 500;
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

    input[type="submit"],
    input[type="reset"],
    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin: 10px;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
    }

    .btn-danger:hover {
      background-color: #a71d2a;
    }

    .btn {
      background-color: #6c757d;
      color: white;
    }

    .btn:hover {
      background-color: #5a6268;
    }

    .form-footer {
      text-align: center;
      margin-top: 20px;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      border-radius: 5px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

<?php include('meta_tags.php'); ?>
<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>

<div class="content">
  <div class="header">
    <h1 class="page-title">Complaint Details</h1>
  </div>
  <!-- Back to Admin Dashboard Button -->
      <a href="complaintdet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
      </a>
  
  <div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <?php include('val.php'); ?>
        <form name="form1" id="formID" method="post" action="complaintdet_insert.php">
          <table border="0">
            <tr>
              <td>Select Accountholder Name</td>
              <td>
                <select name="accholder_id" class="validate[required,custom[onlyNumber]]" id="accholder_id">
                  <?php
                  include('../dbconnect/db.php');
                  $uname=$_SESSION['uname'];
                  $sql="select * from account_holder where account_no='$uname'";
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_array($res)) {
                  ?>
                  <option value="<?php echo $row['accountholder_id'];?>"><?php echo $row['full_name'];?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Complaint Title</td>
              <td><input name="com_title" type="text" id="com_title" class="validate[required]"></td>
            </tr>
            <tr>
              <td>Complaint Description</td>
              <td><textarea name="com_desc" class="validate[required]" id="com_desc"></textarea></td>
            </tr>
            <tr>
              <td>Complaint Date</td>
              <td><input name="com_date" value="<?php echo date('Y-m-d'); ?>" readonly class="validate[required,custom[date]]" type="date" id="com_date"></td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="form-footer">
                  <input type="submit" name="Submit" class="btn-primary" value="Submit">
                  <input type="reset" name="reset" class="btn-danger" value="Reset">
                </div>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

  <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
      <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
      <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>