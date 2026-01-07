<?php include('meta_tags.php'); ?>
<style>
.action-link, .action-delete {
  display: inline-block;
  padding: 6px 12px;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.action-link {
  background-color: #343a40; /* dark button for edit */
  color: #fff;
  border: 1px solid #343a40;
}

.action-link:hover {
  background-color: #007bff; /* blue on hover */
  color: #fff;
}

.action-delete {
  background-color: #6c757d; /* grey button for delete */
  color: #fff;
  border: 1px solid #6c757d;
}

.action-delete:hover {
  background-color: #b30000; /* red on hover */
  color: #fff;
}

.action-link i, .action-delete i {
  margin-right: 6px;
}
</style>

<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="content">
  <div class="header">
    <h1 class="page-title">Account Holder Details</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="btn-toolbar">
        <a href="accountholderdet_form.php" class="btn btn-primary">
          <i class="icon-plus"></i> Add New Account Holder Details
        </a>
      </div>

      <!-- Back to Admin Dashboard Button -->
      <a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
      </a>

      <div class="well">
        <table class="table" id="demo-dtable-01">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Sl No</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Full_name</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">DOB</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Gender</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Address</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Contact_no</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Account_no</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Create_date</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Photo</th>
              <th colspan="3" style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('../dbconnect/db.php');
            $sl = 1;
            $sql = "SELECT * FROM account_holder";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res)) {
            ?>
              <tr>
                <td><?php echo $sl++; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['date_of_birth']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['account_no']; ?></td>
                <td><?php echo $row['create_date']; ?></td>
                <td><img src="<?php echo $row['accountholder_photo']; ?>" width="100" height="120"></td>
                
                <td>
                  <a href="accountholderdet_edit.php?id=<?php echo $row['accountholder_id']; ?>" class="action-link">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                </td>
                <td>
                  <a href="accountholderdet_delete.php?id=<?php echo $row['accountholder_id']; ?>" class="action-delete" onClick="return confirm('Are you sure want to delete?')">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
                <td>
                  <a href="transaction_bill.php?id=<?php echo $row['accountholder_id']; ?>" class="action-link" style="background-color: #28a745; border-color: #28a745;">
                    <i class="fas fa-file-invoice-dollar"></i> Bill
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
  </div>
</div>

<?php include('footer.php'); ?>
