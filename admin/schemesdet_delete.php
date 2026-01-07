<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from schemes where scheme_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="schemesdet_view.php";
</script>