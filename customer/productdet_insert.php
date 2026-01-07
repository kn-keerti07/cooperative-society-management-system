<?php

include('../dbconnect/db.php');

$product_name=$_POST['product_name'];
$product_desc=$_POST['product_desc'];
//$product_img=$_POST['product_img'];
$product_price=$_POST['product_price'];

$product_img=$_FILES["product_img"]['name'];
$tmp_location=$_FILES["product_img"]["tmp_name"];
$target="../uploads/".$product_img;
move_uploaded_file($tmp_location,$target);


$sql="insert into products values(null,'$product_name','$product_desc','$product_img','$product_price')";

mysqli_query($conn,$sql);

?>
<script>

alert('Inserted....');
document.location="productdet_view.php";

</script>
