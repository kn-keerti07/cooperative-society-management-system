<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from product_request where productreq_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="productrequestdet_view.php";
</script>