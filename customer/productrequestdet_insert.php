<?php

include('../dbconnect/db.php');

$product_id=$_POST['product_id'];
$accholder_id=$_POST['accholder_id'];
$quantity=$_POST['quantity'];
$req_date=$_POST['req_date'];
$req_status=$_POST['req_status'];

$sql="insert into product_request values(null,'$product_id','$accholder_id','$quantity','$req_date','$req_status')";

mysqli_query($conn,$sql);

?>
<script>

alert('Inserted....');
document.location="productrequestdet_view.php";

</script>
