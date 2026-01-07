<?php include('meta_tags.php');?>
<?php include('menus.php');?>
    
  
    <?php include('side_menu.php');?>


    <div class="content">
        
<div class="header">
            
            <h1 class="page-title">Account Holder  Details</h1>
        </div>
        
                <div class="container-fluid">
            <div class="row-fluid">
                  
<div class="well">
    
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php include('val.php');?>
<?php

include('../dbconnect/db.php');
$id=$_REQUEST['id'];

$sql="select * from account_holder where accountholder_id='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>
<form name="form1" id="formID" method="post" action="accountholderdet_update.php">
<input type="hidden" value="<?php echo $row['accountholder_id'];?>" name="accountholder_id">

  <div align="center">
    <table width="491" border="0">
      
      <tr>
        <td width="217">Full_Name</td>
        <td width="258"><input name="Fullname" class="validate[required,custom[onlyLetter]]" type="text" id="Fullname" value="<?php echo $row['full_name'];?>"></td>
      </tr>
      <tr>
        <td>Date_of_Birth</td>
        <td><input name="dob" class="validate[required]" type="date" id="dob" value="<?php echo $row['date_of_birth'];?>"></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input name="Gend" class="validate[required]" type="radio" id="Gend" value="Male" <?php if($row['gender']=='Male'){?> checked <?php } ?>>Male
		<input name="Gend" class="validate[required]" type="radio" id="Gend" value="Male" <?php if($row['gender']=='Female'){?> checked <?php } ?>>Female</td>
      </tr>
      <tr>
        <td>Address</td>
        <td><textarea name="Adrs" class="validate[required]" id="Adrs"><?php echo $row['address'];?></textarea></td>
      </tr>
      <tr>
        <td>Email_ID</td>
        <td><input type="text" name="emailid"  class="validate[required,custom[email]]"  id="emailid" value="<?php echo $row['email_id'];?>"></td>
      </tr>
      <tr>
        <td>Contact_No</td>
        <td><input name="contactno" class="validate[required,custom[onlyNumber]]" type="text" id="contactno" value="<?php echo $row['contact_no'];?>"></td>
      </tr>
      <tr>
        <td>Occupation</td>
        <td><div align="left">
          <input name="occupa" class="validate[required,custom[onlyLetter]]" type="text" id="occupa" value="<?php echo $row['occupation'];?>">
        </div></td>
      </tr>
      <tr>
        <td>Account_No</td>
        <td><input name="accno" readonly=""  class="validate[required,custom[onlyNumber]]" type="text" id="accno" value="<?php echo $row['account_no'];?>"></td>
      </tr>
      <tr>
        <td>Create_Date</td>
        <td><input name="createdate" class="validate[required]" type="date" id="createdate" value="<?php echo $row['create_date'];?>"></td>
      </tr>
      <tr>
        <td>AccountHolder_Photo</td>
        <td><input name="accholderphoto" class="validate[required]" type="text" id="accholderphoto" value="<?php echo $row['accountholder_photo'];?>"></td>
      </tr>
      <tr>
        <td>Signature</td>
        <td><input name="sign" class="validate[required]" type="text" id="sign" value="<?php echo $row['signature'];?>"></td>
      </tr>
      <tr>
        <td>Aadhar_No</td>
        <td><input name="adharno" class="validate[required,custom[onlyNumber]]" type="text" id="adharno" value="<?php echo $row['adhar_no'];?>"></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
          <input type="reset" class="btn btn-danger"  name="reset" value="reset">
        </div></td>
      </tr>
    </table>
    </div>
</form>
</div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


           <?php include('footer.php');  ?>          
      
