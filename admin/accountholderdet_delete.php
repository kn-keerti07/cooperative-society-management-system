<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from account_holder where accountholder_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="accountholderdet_view.php";
</script>