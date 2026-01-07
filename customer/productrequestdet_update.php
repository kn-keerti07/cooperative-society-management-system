<?php

include('../dbconnect/db.php');

$productreq_id=$_POST['productreq_id'];
$product_id=$_POST['product_id'];
$accholder_id=$_POST['accholder_id'];
$quantity=$_POST['quantity'];
$req_date=$_POST['req_date'];
$req_status=$_POST['req_status'];

$sql="update product_request set product_id='$product_id',accountholder_id='$accholder_id',quantity='$quantity',request_date='$req_date',request_status='$req_status' where productreq_id='$productreq_id'";

mysqli_query($conn,$sql);

?>
<script>

alert('Updated....');
document.location="productrequestdet_view.php";

</script>
