<?php include('meta_tags.php'); ?>
<?php include('menus.php'); ?>
<?php include('side_menu.php'); ?>

<div class="content">
  <div class="header">
    <h1 class="page-title">Transaction Details</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">

      <div class="btn-toolbar"></div>
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
          <a href="search_account_holder_view.php" class="btn btn-secondary">Reset</a>
        </form>
        <br>

        <table class="table table-bordered" >
          <thead>
            <tr>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Sl No</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Account Holder Name</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Account Number</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Deposit Amount</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Withdrawal Amount</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Date</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Time</th>
              <th style="padding: 8px; text-align: center; background-color: #343a40; color: #ffffff; font-weight: bold; border: 1px solid #ddd;">Balance</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('../dbconnect/db.php');
            $sl = 1;
            $total_deposit = 0;
            $total_withdrawal = 0;
            $balances = [];

            $filter = "";
            if (!empty($_GET['account_no'])) {
                $account_no = mysqli_real_escape_string($conn, $_GET['account_no']);
                $filter = " AND a.account_no LIKE '%$account_no%'";
            }

            $sql = "SELECT 
                      t.transaction_id,
                      t.transaction_type,
                      t.amount,
                      t.date,
                      t.time,
                      a.full_name,
                      a.accountholder_id,
                      a.account_no
                    FROM transaction t
                    JOIN account_holder a ON t.accountholder_id = a.accountholder_id
                    WHERE 1=1 $filter
                    ORDER BY a.accountholder_id, t.date, t.time, t.transaction_id";

            $res = mysqli_query($conn, $sql);
            $current_acc_id = null;
            $running_balance = 0;

            while ($row = mysqli_fetch_array($res)) {
                // Reset balance when new account holder is encountered
                if ($current_acc_id !== $row['accountholder_id']) {
                    $current_acc_id = $row['accountholder_id'];
                    $running_balance = 0;
                }

                $deposit = 0;
                $withdrawal = 0;

                if ($row['transaction_type'] === 'DEPOSIT') {
                    $deposit = $row['amount'];
                    $running_balance += $deposit;
                    $total_deposit += $deposit;
                } elseif ($row['transaction_type'] === 'WITHDRAWAL') {
                    $withdrawal = $row['amount'];
                    $running_balance -= $withdrawal;
                    $total_withdrawal += $withdrawal;
                }
            ?>
              <tr>
                <td><?php echo $sl++; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['account_no']; ?></td>
                <td><?php echo $deposit > 0 ? number_format($deposit, 2) : '-'; ?></td>
                <td><?php echo $withdrawal > 0 ? number_format($withdrawal, 2) : '-'; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo number_format($running_balance, 2); ?></td>
              </tr>
            <?php } ?>

            <!-- Totals -->
            <tr style="font-weight: bold; background-color: #f5f5f5;">
              <td colspan="3" align="right">Total</td>
              <td><?php echo number_format($total_deposit, 2); ?></td>
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
