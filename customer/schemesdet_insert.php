<?php

include('../dbconnect/db.php');

$scheme_name=$_POST['scheme_name'];
$scheme_desc=$_POST['scheme_desc'];
$scheme_attach=$_POST['scheme_attach'];
$scheme_duration=$_POST['scheme_duration'];
$scheme_status=$_POST['scheme_status'];

$sql="insert into schemes values(null,'$scheme_name','$scheme_desc','$scheme_attach','$scheme_duration','$scheme_status')";

mysqli_query($conn,$sql);

?>
<script>

alert('Inserted....');
document.location="schemesdet_view.php";

</script>
