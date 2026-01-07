<?php
session_start();

include('dbconnect/db.php');

$username=$_POST['username'];
$password=$_POST['password'];

$sql="select * from login where username='$username' and password='$password'";
$res=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($res))
{
$_SESSION['uname']=$username;
$type=$row['type'];

if($type=='admin')
{
?>
<script>
document.location="admin/home.php";
</script>
<?php
}

else if($type=='customer')
{
?>
<script>
document.location="customer/home.php";
</script>
<?php
}

}
else
{
?>
<script>
alert("Invalid Username Or Password....");
history.back();
</script>
<?php
}

?>