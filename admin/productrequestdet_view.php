<?php include('meta_tags.php');  ?>
<?php include('menus.php');  ?>
<?php include('side_menu.php');  ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* Common Action Box */
.action-box {
  display: inline-block;
  padding: 6px 12px;
  border-radius: 5px;
  border: 1px solid transparent;
  font-weight: 500;
  text-align: center;
  text-decoration: none;
  transition: all 0.3s ease;
  cursor: pointer;
  font-size: 14px;
}

/* Confirm Button (Gray) */
.action-confirm {
  background-color: #6c757d;
  color: #fff;
  border: 1px solid #6c757d;
}

.action-confirm:hover {
  background-color: #ffc107; /* Bright Yellow */
  border-color: #ffc107;
  color: #000; /* Better contrast */
  box-shadow: 0 0 10px rgba(255, 193, 7, 0.6);
}

/* Delete Button (Light Gray) */
.action-delete {
  background-color: #adb5bd;
  color: #fff;
  border: 1px solid #adb5bd;
}

.action-delete:hover {
  background-color: #ff4d4f; /* Bright Red */
  border-color: #ff4d4f;
  color: #fff;
  box-shadow: 0 0 10px rgba(255, 77, 79, 0.6);
}

/* Payment Button (Green) */
.action-payment {
  background-color: #28a745;
  color: #fff;
  border: 1px solid #28a745;
}

.action-payment:hover {
  background-color: #00c851; /* Bright Green */
  border-color: #00c851;
  box-shadow: 0 0 10px rgba(0, 200, 81, 0.6);
}
</style>


<div class="content">
  <div class="header">
    <h1 class="page-title">Product Request Details</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="btn-toolbar">
        <div class="btn-group"></div>
      </div>
	  <!-- Back to Admin Dashboard Button -->
<a href="home.php" class="btn btn-info" style="margin-bottom: 15px;">
  <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

      <div class="well">
        <table class="table" id="demo-dtable-01">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Image</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Name</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Account No</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Accountholder Name</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Product Price</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Quantity</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Total</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Date</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Status</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            include('../dbconnect/db.php');
            $sl = 1;
            $sql = "SELECT * FROM product_request pr, products p, account_holder ah 
                    WHERE pr.product_id = p.product_id AND ah.account_no = pr.account_no";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res)) {
              $totp = ($row['product_price'] * $row['quantity']);
          ?>
            <tr>
              <td><?php echo $sl++; ?></td>
              <td><img src="../uploads/<?php echo $row['product_image']; ?>" width="100" height="80"></td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['account_no']; ?></td>
              <td><?php echo $row['full_name']; ?></td>
              <td><?php echo $row['product_price']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $totp; ?></td>
              <td><?php echo $row['request_date']; ?></td>
              <td>
                <?php echo $row['request_status']; ?>
                <?php if ($row['request_status'] == 'CONFIRMED') { ?>
                  <br>
                  <a href="paymentsdet_form.php?id=<?php echo $row['productreq_id']; ?>&totp=<?php echo $totp; ?>"
                     class="action-box action-payment">
                    <i class="fas fa-money-bill-wave" style="margin-right: 4px;"></i> Receive Payment
                  </a>
                <?php } ?>
              </td>
              <td>
                <a href="confirm_request.php?id=<?php echo $row['productreq_id']; ?>"
                   class="action-box action-confirm"
                   onClick="return confirm('Are you sure want to Confirm Order?')">
                  <i class="fas fa-check" style="margin-right: 4px;"></i> Confirm
                </a>
              </td>
              <td>
                <?php if ($row['request_status'] != 'CONFIRMED') { ?>
                  <a href="productrequestdet_delete.php?id=<?php echo $row['productreq_id']; ?>"
                     class="action-box action-delete"
                     onClick="return confirm('Are you sure want to delete?')">
                    <i class="fas fa-trash" style="margin-right: 4px;"></i> Delete
                  </a>
                <?php } ?>
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
