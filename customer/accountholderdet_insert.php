<?php
include('../dbconnect/db.php');

$Full_Name=$_POST['Fullname'];
$Date_of_Birth=$_POST['dob'];
$Gender=$_POST['Gend'];
$Address=$_POST['Adrs'];
$Email_ID=$_POST['emailid'];
$Contact_No=$_POST['contactno'];
$Occupation=$_POST['occupa'];
$Account_No=$_POST['accno'];
$Create_Date=$_POST['createdate'];
$AccountHolder_Photo=$_POST['accholderphoto'];
$Signature=$_POST['sign'];
$Aadhar_No=$_POST['adharno'];
$sql="insert into account_holder values(null,'$Full_Name','$Date_of_Birth','$Gender','$Address','$Email_ID','$Contact_No','$Occupation','$Account_No','$Create_Date','$AccountHolder_Photo','$Signature','$Aadhar_No')";
mysqli_query($conn,$sql);
?>
<script>
alert('Inserted....');
document.location="accountholderdet_view.php";

</script>




