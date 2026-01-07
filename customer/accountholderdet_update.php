<?php
include('../dbconnect/db.php');
$accountholder_id=$_POST['accountholder_id'];
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

$sql="update account_holder set full_name='$Full_Name',date_of_birth='$Date_of_Birth',gender='$Gender',address='$Address',email_id='$Email_ID',contact_no='$Contact_No',occupation='$Occupation',account_no='$Account_No',create_date='$Create_Date',accountholder_photo='$AccountHolder_Photo',signature='$Signature',adhar_no='$Aadhar_No' where accountholder_id='$accountholder_id' ";
mysqli_query($conn,$sql);
?>
<script>
alert('Updated....');
document.location="accountholderdet_view.php";

</script>




