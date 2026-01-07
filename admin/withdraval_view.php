<?php include('meta_tags.php'); ?>
<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>

<div class="content">
  <div class="header">
    <h1 class="page-title">Withdrawal Details</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">

      <div class="btn-toolbar">
        <a href="transactiondet_form.php" class="btn btn-primary">
          <i class="icon-plus"></i> Transaction Details
        </a>
        <div class="btn-group"></div>
      </div>
	   <!-- Back to Admin Dashboard Button -->
            <a href="transactiondet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>

      <div class="well">

        <!-- Search Form -->
        <form method="GET" action="">
          <label for="account_no">Search by Account Number:</label>
          <input type="text" name="account_no" id="account_no"
                 placeholder="Enter Account Number"
                 value="<?php echo isset($_GET['account_no']) ? $_GET['account_no'] : ''; ?>" />
          <button type="submit" class="btn btn-info">Search</button>
          <a href="withdraval_view.php" class="btn btn-secondary">Reset</a>
        </form>
        <br>

        <table class="table" >
          <thead>
            <tr>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Transaction Type</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Account Holder Name</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Account Number</th> <!-- Added -->
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Amount</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Date</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Time</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Balance</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('../dbconnect/db.php');
              $sl = 1;
              $total_withdrawal = 0;

              // Search filter
              $filter = "";
              if (!empty($_GET['account_no'])) {
                  $account_no = mysqli_real_escape_string($conn, $_GET['account_no']);
                  $filter = " AND a.account_no LIKE '%$account_no%'";
              }

              // Query for withdrawals only
              $sql = "SELECT 
                        t.transaction_id,
                        t.transaction_type,
                        t.amount,
                        t.date,
                        t.time,
                        a.full_name,
                        a.accountholder_id,
                        a.account_no,
                        (
                          SELECT COALESCE(SUM(CASE 
                            WHEN t2.transaction_type = 'DEPOSIT' THEN t2.amount
                            WHEN t2.transaction_type = 'WITHDRAWAL' THEN -t2.amount
                            ELSE 0 END), 0)
                          FROM transaction t2
                          WHERE t2.accountholder_id = a.accountholder_id
                        ) AS balance
                      FROM transaction t
                      JOIN account_holder a ON t.accountholder_id = a.accountholder_id
                      WHERE t.transaction_type = 'WITHDRAWAL' $filter
                      ORDER BY t.date DESC, t.time DESC";

              $res = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($res)) {
                $total_withdrawal += $row['amount'];
            ?>
            <tr>
              <td><?php echo $sl++; ?></td>
              <td><?php echo $row['transaction_type']; ?></td>
              <td><?php echo $row['full_name']; ?></td>
              <td><?php echo $row['account_no']; ?></td> <!-- Display account number -->
              <td><?php echo number_format($row['amount'], 2); ?></td>
              <td><?php echo $row['date']; ?></td>
              <td><?php echo $row['time']; ?></td>
              <td><?php echo number_format($row['balance'], 2); ?></td>
            </tr>
            <?php } ?>

            <!-- Total Row -->
            <tr style="font-weight:bold; background-color:#f5f5f5;">
              <td colspan="4" align="right">Total Withdrawal Amount:</td>
              <td><?php echo number_format($total_withdrawal, 2); ?></td>
              <td colspan="3"></td>
            </tr>

          </tbody>

        </table>
      </div>

    </div>
  </div>
</div>

<?php include('footer.php'); ?>
