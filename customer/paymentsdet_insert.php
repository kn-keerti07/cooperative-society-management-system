<?php

include('../dbconnect/db.php');

$productreq_id=$_POST['productreq_id'];
$bill_amount=$_POST['bill_amount'];
$transaction_id=$_POST['transaction_id'];
$transaction_type=$_POST['transaction_type'];
$transaction_date=$_POST['transaction_date'];

$sql="insert into payments values(null,'$productreq_id','$bill_amount','$transaction_id','$transaction_type','$transaction_date')";

mysqli_query($conn,$sql);

?>
<script>

alert('Inserted....');
document.location="paymentsdet_view.php";

</script>
