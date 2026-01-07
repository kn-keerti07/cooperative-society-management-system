<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="update product_request  set request_status='CONFIRMED' where productreq_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Confirmed....');
document.location="productrequestdet_view.php";
</script>