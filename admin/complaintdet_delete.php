<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from complaints where complaint_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="complaintdet_view.php";
</script>