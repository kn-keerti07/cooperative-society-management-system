<?php

include('../dbconnect/db.php');

$product_id=$_POST['product_id'];
$product_name=$_POST['product_name'];
$product_desc=$_POST['product_desc'];

$product_price=$_POST['product_price'];
$status=$_POST['status'];


$sql="update products set product_id='$product_id',product_name='$product_name',product_description='$product_desc',product_price='$product_price',product_status='$status' where product_id='$product_id'";

mysqli_query($conn,$sql);

?>
<script>

alert('Updated....');
document.location="productdet_view.php";

</script>
