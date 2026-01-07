<?php

include('../dbconnect/db.php');

$scheme_id=$_POST['scheme_id'];
$scheme_name=$_POST['scheme_name'];
$scheme_desc=$_POST['scheme_desc'];
$scheme_attach=$_POST['scheme_attach'];
$scheme_duration=$_POST['scheme_duration'];
$scheme_status=$_POST['scheme_status'];

$sql="update schemes set scheme_name='$scheme_name',scheme_description='$scheme_desc',scheme_attachfile='$scheme_attach',scheme_duration='$scheme_duration',scheme_status='$scheme_status' where scheme_id='$scheme_id'";

mysqli_query($conn,$sql);

?>
<script>

alert('Updated....');
document.location="schemesdet_view.php";

</script>
