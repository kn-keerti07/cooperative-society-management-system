<?php

include('../dbconnect/db.php');

$accountholder_id=$_POST['accholder_id'];
$com_title=$_POST['com_title'];
$com_desc=$_POST['com_desc'];
$com_date=$_POST['com_date'];
$com_status=$_POST['com_status'];

$sql="insert into complaints values(null,'$accountholder_id','$com_title','$com_desc','$com_date','$com_status')";

mysqli_query($conn,$sql);

?>
<script>

alert('Inserted....');
document.location="complaintdet_view.php";

</script>
