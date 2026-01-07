<?php

include('../dbconnect/db.php');

$transaction_type=$_POST['transaction_type'];
$accholder_id=$_POST['accholder_id'];
$amount=$_POST['amount'];
$date=$_POST['date'];
$time=$_POST['time'];

$sql="insert into transaction values(null,'$transaction_type','$accholder_id','$amount','$date','$time')";

mysqli_query($conn,$sql);

?>
<script>

alert('Transaction Added....');
document.location="transactiondet_view.php";

</script>
