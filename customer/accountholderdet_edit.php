
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account Details</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #eef2f3;
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
    <h1 class="page-title">My Account Details</h1>
  </div>
  <!-- Back to Admin Dashboard Button -->
<a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
  <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>
 
  
  <div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <?php include('val.php'); ?>
        <?php
        include('../dbconnect/db.php');
        $uname=$_SESSION['uname'];
        $sql="select * from account_holder where account_no='$uname'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        ?>
        
        <form name="form1" id="formID" method="post" action="accountholderdet_update.php">
          <input type="hidden" value="<?php echo $row['accountholder_id'];?>" name="accountholder_id">
          
          <table border="0">
            <tr>
              <td>Full Name</td>
              <td><input name="Fullname" class="validate[required,custom[onlyLetter]]" type="text" id="Fullname" value="<?php echo $row['full_name'];?>"></td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><input name="dob" class="validate[required]" type="date" id="dob" value="<?php echo $row['date_of_birth'];?>"></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><input name="Gend" class="validate[required]" type="text" id="Gend" value="<?php echo $row['gender'];?>"></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><textarea name="Adrs" class="validate[required]" id="Adrs"><?php echo $row['address'];?></textarea></td>
            </tr>
            <tr>
              <td>Email ID</td>
              <td><input name="emailid" type="text" class="validate[required,custom[email]]" type="text" id="emailid" value="<?php echo $row['email_id'];?>"></td>
            </tr>
            <tr>
              <td>Contact No</td>
              <td><input name="contactno" class="validate[required,custom[onlyNumber]]" type="text" id="contactno" value="<?php echo $row['contact_no'];?>"></td>
            </tr>
            <tr>
              <td>Occupation</td>
              <td><input name="occupa" class="validate[required,custom[onlyLetter]]" type="text" id="occupa" value="<?php echo $row['occupation'];?>"></td>
            </tr>
            <tr>
              <td>Account No</td>
              <td><input name="accno" class="validate[required,custom[onlyNumber]]" type="text" id="accno" value="<?php echo $row['account_no'];?>"></td>
            </tr>
            <tr>
              <td>Create Date</td>
              <td><input name="createdate" class="validate[required]" type="date" id="createdate" value="<?php echo $row['create_date'];?>"></td>
            </tr>
            <tr>
              <td>AccountHolder Photo</td>
              <td><img src="<?php echo $row['accountholder_photo'];?>" width="200" height="150"></td>
            </tr>
            <tr>
              <td>Signature</td>
              <td><img src="<?php echo $row['signature'];?>" width="200" height="150"></td>
            </tr>
            <tr>
              <td>Aadhar No</td>
              <td><input name="adharno" class="validate[required,custom[onlyNumber]]" type="text" id="adharno" value="<?php echo $row['adhar_no'];?>"></td>
            </tr>
            <tr>
              <td colspan="2">
                <div style="text-align: center;">                </div>
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