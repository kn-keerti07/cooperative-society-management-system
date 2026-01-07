<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from payments where payment_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="paymentsdet_view.php";
</script>