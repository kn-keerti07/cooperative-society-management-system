<?php
;
error_reporting(0);

include('../dbconnect/db.php');

// Get the account holder ID from the URL
$accountholder_id = $_GET['id'];

// Check if the ID is numeric to prevent SQL injection
if (!is_numeric($accountholder_id)) {
    die("Invalid account holder ID");
}

// Fetch account holder details
$query_holder = "SELECT * FROM account_holder WHERE accountholder_id = ?";
$stmt_holder = mysqli_prepare($conn, $query_holder);
if (!$stmt_holder) {
    die("Error preparing account holder query: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt_holder, "i", $accountholder_id);
mysqli_stmt_execute($stmt_holder);
$result_holder = mysqli_stmt_get_result($stmt_holder);

if (mysqli_num_rows($result_holder) == 0) {
    die("Account holder not found.");
}
$holder = mysqli_fetch_assoc($result_holder);

// Fetch transactions
$query_transactions = "SELECT * FROM transaction WHERE accountholder_id = ? ORDER BY date DESC";
$stmt_transactions = mysqli_prepare($conn, $query_transactions);
if (!$stmt_transactions) {
    die("Error preparing transaction query: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt_transactions, "i", $accountholder_id);
mysqli_stmt_execute($stmt_transactions);
$result_transactions = mysqli_stmt_get_result($stmt_transactions);

$transactions_message = (mysqli_num_rows($result_transactions) == 0) ? "No transactions found for this account holder." : "";

// Handle form submission
$hide_buttons = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_mail'])) {
    $hide_buttons = true;
}

ob_start(); // Start output buffer
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Transaction Bill</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f7fb;
      margin: 0;
      padding: 0;
      color: #333;
      font-size: 18px;
    }

    .bill-container {
      background: #ffffff;
      padding: 40px;
      border-radius: 8px;
      max-width: 900px;
      margin: 40px auto;
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #2c3e50;
      font-size: 32px;
    }

    h4 {
      text-align: center;
      color: #3498db;
      font-size: 24px;
    }

    .bill-container p {
      font-size: 18px;
      margin: 12px 0;
    }

    .bill-container table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
      font-size: 18px;
    }

    th {
      background-color: #3498db;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .total {
      font-weight: bold;
      background-color: #f1f1f1;
      text-align: right;
    }

    .total td {
      font-size: 20px;
    }

    .print-btn, .send-btn {
      margin-top: 30px;
      text-align: center;
    }

    .print-btn button, .send-btn button {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 16px 40px;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .print-btn button:hover, .send-btn button:hover {
      background-color: #2980b9;
    }

    @media print {
      .print-btn, .send-btn, .back-btn {
        display: none;
      }
    }

    .back-btn {
      margin: 20px;
    }

    .back-btn a {
      text-decoration: none;
      background-color: #2980b9;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
    }

    .back-btn a:hover {
      background-color: #1f6ea0;
    }
  </style>
</head>
<body>



<div class="bill-container">
  <h2>MSS VANALLI</h2>
  <h4>Transaction Bill</h4>

  <p><strong>Name:</strong> <?= htmlspecialchars($holder['full_name']) ?></p>
  <p><strong>Account No:</strong> <?= htmlspecialchars($holder['account_no']) ?></p>
  <p><strong>Bill Date:</strong> <?= date("Y-m-d") ?></p>

  <?php if ($transactions_message): ?>
    <p><?= $transactions_message ?></p>
  <?php else: ?>
    <table>
      <tr>
        <th>S/N</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
      <?php
      $sn = 1;
      $total = 0;
      mysqli_data_seek($result_transactions, 0);
      while ($row = mysqli_fetch_assoc($result_transactions)) {
        echo "<tr>
                <td>{$sn}</td>
                <td>" . htmlspecialchars($row['transaction_type']) . "</td>
                <td>₹" . number_format($row['amount'], 2) . "</td>
                <td>" . htmlspecialchars($row['date']) . "</td>
                <td>" . htmlspecialchars($row['time']) . "</td>
              </tr>";
        $total += $row['amount'];
        $sn++;
      }
      ?>
      <tr class="total">
        <td colspan="2">Total</td>
        <td>₹<?= number_format($total, 2) ?></td>
        <td colspan="2"></td>
      </tr>
    </table>
  <?php endif; ?>

  <?php if (!$hide_buttons): ?>
    <div class="print-btn">
      <button onclick="window.print()">Print Bill</button>
    </div>

    <div class="send-btn">
      <form method="post">
        <input type="hidden" name="send_mail" value="1">
        <button type="submit">Send Mail</button>
      </form>
    </div>
  <?php endif; ?>
</div>

</body>
</html>

<?php
// Send Mail Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_mail'])) {
    require 'PHPMailer/PHPMailerAutoload.php';

    $html_content = ob_get_clean(); // Get the full HTML

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vtechprojectmail@gmail.com';
    $mail->Password = 'ttnftyfthdlaoohy'; // Use app-specific password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('vtechprojectmail@gmail.com', 'MSS VANALLI');
    $mail->addAddress($holder['email_id'], $holder['full_name']);
    $mail->isHTML(true);

    $mail->Subject = 'Transaction Bill - MSS VANALLI';
    $mail->Body    = $html_content;
    $mail->AltBody = 'Please view this email in an HTML-compatible email viewer.';

    if (!$mail->send()) {
        echo "<script>alert('Message could not be sent. Error: " . $mail->ErrorInfo . "');</script>";
    } else {
        echo "<script>alert('Transaction bill sent successfully to {$holder['email_id']}'); document.location='accountholderdet_view.php';</script>";
    }
}

// Close DB connections
mysqli_stmt_close($stmt_holder);
mysqli_stmt_close($stmt_transactions);
mysqli_close($conn);
?>
