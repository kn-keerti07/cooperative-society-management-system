<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction Details</title>
 
</head>
<body>
<?php include('meta_tags.php'); ?>
<?php include('menus.php'); ?>

<?php include('side_menu.php'); ?>


<div class="content">

  <div class="header"> 
    <h1 class="page-title">Transaction Details</h1>
  </div>
  

  <div class="container-fluid">
    <div class="row-fluid">
	<!-- Back to Admin Dashboard Button -->
<a href="transactiondet_view.php" class="btn btn-info" style="margin-bottom: 15px;">
  <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

      <div class="well">

        <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">
            <?php include('val.php'); ?>
            <form name="form1" id="formID" method="post" action="transactiondet_insert.php">
              <div align="center">
                <table width="681" height="334" border="0">

                  <!-- Transaction Type -->
                  <tr>
                    <td width="236">Transaction Type</td>
                    <td width="262">
                      <select id="transaction_type" name="transaction_type" class="validate[required]" required>
                        <option value=" ">SELECT</option>
                        <option value="DEPOSIT">Deposit</option>
                        <option value="WITHDRAWAL">Withdrawal</option>
                      </select>
                    </td>
                  </tr>

                  <!-- Account Holder Name -->
                  <tr>
                    <td>Select AccountHolder Name</td>
                    <td>
                      <select name="accholder_id" class="validate[required,custom[onlyNumber]]" id="accholder_id" onchange="getBalance()">
                        <option value="">Select Account Holder</option>
                        <?php
                        include('../dbconnect/db.php');
                        $sql = "SELECT * FROM account_holder";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                          <option value="<?php echo $row['accountholder_id']; ?>">
                            <?php echo $row['full_name'] . ' - ' . $row['account_no']; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- Amount -->
                  <tr>
                    <td height="33">Amount</td>
                    <td><input name="amount" class="validate[required,custom[onlyNumber]]" type="text" id="amount"></td>
                  </tr>

                  <!-- Date -->
                  <tr>
                    <td>Date</td>
                    <td><input name="date" value="<?php echo date('Y-m-d'); ?>" readonly="" class="validate[required]" type="date" id="date"></td>
                  </tr>

                  <!-- Time -->
                  <tr>
                    <td>Time</td>
                    <td><input name="time" value="<?php echo date('H:i'); ?>" readonly="" class="validate[required]" type="text" id="time"></td>
                  </tr>

                  <!-- Account Balance Display -->
                  <tr>
                    <td><strong>Account Balance</strong></td>
                    <td><input type="text" name="balance" id="balance" readonly></td>
                  </tr>

                  <!-- Submit and Reset buttons -->
                  <tr>
                    <td colspan="2">
                      <div align="center">
                        <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
                        <input type="reset" class="btn btn-danger" name="reset" value="reset">
                      </div>
                    </td>
                  </tr>

                </table>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
      <h3 id="myModalLabel">&nbsp;</h3>
    </div>
    <div class="modal-footer"></div>
  </div>

</div>

<?php include('footer.php'); ?>

<script>
// Function to get balance of selected account holder
function getBalance() {
    var accHolderId = document.getElementById('accholder_id').value;

    if (accHolderId != '') {
        // AJAX request to fetch the balance
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_balance.php?accountholder_id=' + accHolderId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the balance in the balance input field
                document.getElementById('balance').value = xhr.responseText;
            }
        };
        xhr.send();
    } else {
        document.getElementById('balance').value = ''; // Clear balance if no account is selected
    }
}
</script>
</body>
</html>
