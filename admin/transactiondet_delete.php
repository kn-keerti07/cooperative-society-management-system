<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from transaction where transaction_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="transactiondet_view.php";
</script>