<?php
include('../dbconnect/db.php');

$id=$_REQUEST['id'];
 
$sql="delete from products where product_id='$id'";
mysqli_query($conn,$sql);
 

?>

<script>
alert('Deleted....');
document.location="productdet_view.php";
</script>