<?php

include('../dbconnect/db.php');

$transaction_id=$_POST['transaction_id'];
$transaction_type=$_POST['transaction_type'];
$accholder_id=$_POST['accholder_id'];
$amount=$_POST['amount'];
$date=$_POST['date'];
$time=$_POST['time'];

$sql="update transaction set transaction_type='$transaction_type',accountholder_id='$accholder_id',amount='$amount',date='$date',time='$time' where transaction_id='$transaction_id' ";

mysqli_query($conn,$sql);

?>
<script>

alert('Updated....');
document.location="transactiondet_view.php";

</script>
