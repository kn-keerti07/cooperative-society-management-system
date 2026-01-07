<?php include('meta_tags.php'); ?>
<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>

<!-- Font Awesome for icons -->
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

/* Delete Button - Default Gray */
.action-delete {
  background-color: #6c757d; /* Gray */
  color: #fff;
  border: 1px solid #6c757d;
}

.action-delete:hover {
  background-color: #e63946; /* Red on hover */
  border-color: #e63946;
  color: #fff;
  box-shadow: 0 0 10px rgba(230, 57, 70, 0.4);
}
</style>



<div class="content">
  <div class="header">
    <h1 class="page-title">Payment Details</h1>
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
        <!-- Date Filter Form -->
        <form method="GET" class="form-inline" style="margin-bottom: 20px;">
          <label>From:</label>
          <input type="date" name="from_date" value="<?php echo $_GET['from_date'] ?? ''; ?>" required>
          <label>To:</label>
          <input type="date" name="to_date" value="<?php echo $_GET['to_date'] ?? ''; ?>" required>
          <button type="submit" class="btn btn-primary">Filter</button>
          <a href="paymentsdet_view.php" class="btn btn-secondary">Reset</a>
        </form>

        <table class="table" id="demo-dtable-01">
          <thead>
            <tr>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Productreq_id</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Bill_amount</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction_id</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction_type</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction_date</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('../dbconnect/db.php');
            $sl = 1;
            $total_amount = 0;

            $condition = "";
            if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
              $from = $_GET['from_date'];
              $to = $_GET['to_date'];
              $condition = " AND p.transaction_date BETWEEN '$from' AND '$to'";
            }

            $sql = "SELECT * FROM payments p, product_request pr, products pp 
                    WHERE p.productreq_id = pr.productreq_id 
                    AND pp.product_id = pr.product_id $condition 
                    ORDER BY p.transaction_date DESC";

            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res)) {
              $total_amount += $row['bill_amount'];
            ?>
              <tr>
                <td><?php echo $sl++; ?></td>
                <td><?php echo $row['productreq_id']; ?></td>
                <td><?php echo number_format($row['bill_amount'], 2); ?></td>
                <td><?php echo $row['transaction_id']; ?></td>
                <td><?php echo $row['transaction_type']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
                <td>
                  <a href="paymentsdet_delete.php?id=<?php echo $row['payment_id']; ?>"
                     class="action-box action-delete"
                     onClick="return confirm('Are you sure want to delete?')">
                    <i class="fas fa-trash" style="margin-right: 4px;"></i> Delete
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"><strong>Total</strong></td>
              <td><strong><?php echo number_format($total_amount, 2); ?></strong></td>
              <td colspan="4"></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
