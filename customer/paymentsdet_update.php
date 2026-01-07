<?php

include('../dbconnect/db.php');

$payment_id=$_POST['payment_id'];
$productreq_id=$_POST['productreq_id'];
$bill_amount=$_POST['bill_amount'];
$transaction_id=$_POST['transaction_id'];
$transaction_type=$_POST['transaction_type'];
$transaction_date=$_POST['transaction_date'];

$sql="update payments set productreq_id='$productreq_id',bill_amount='$bill_amount',transaction_id='$transaction_id',transaction_type='$transaction_type',transaction_date='$transaction_date' where payment_id='$payment_id' ";

mysqli_query($conn,$sql);

?>
<script>

alert('Updated....');
document.location="paymentsdet_view.php";

</script>
